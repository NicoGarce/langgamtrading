<?php

class Langgam
{
    //connecting to db and PDO
    private $server = "mysql:host=localhost;dbname=langgamtrading";
    private $user = "root";
    private $pass = "";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>
        PDO::FETCH_ASSOC
    );
    protected $con;

    public function openConnection()
    {
        try {

            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;

        } catch (PDOException $e) {
            echo "There is a problem with the connection :" . $e->getMessage();
        }
    }


    public function closeConnection()
    {
        $this->con = null;
    }


    public function login()
    {
        session_start();

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $conn = $this->openConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {

                $user = $stmt->fetch();
                $userid = $user['ID'];
                $role = $user['role'];

                if (password_verify($password, $user['password'])) {
                    $_SESSION['role'] = $user['role'];

                    // Redirect the user to the appropriate dashboard based on their role
                    if ($_SESSION['role'] == "Administrator") {
                        $_SESSION['m_un'] = $username;
                        $_SESSION['access'] = $role;
                        $_SESSION['ID'] = $user['ID'];
                        header("Location: pages/admin/admin_dashboard.php");
                        exit;
                    } else if ($_SESSION['role'] == "Employee") {
                        $_SESSION['m_un'] = $username;
                        $_SESSION['access'] = $role;
                        $_SESSION['ID'] = $user['ID'];
                        header("Location: pages/employee/emp_dashboard.php");
                        exit;
                    }
                } else {
                    // Display an error message if the password is incorrect
                    echo '<div class="alert alert-danger fade show text-center p-2 px-2">
                        <strong>Incorrect Password</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>';
                }
            } else {
                // Display an error message if the username is incorrect
                echo '<div class="alert alert-danger text-center p-2 px-2">
                    <strong>Username is Incorrect</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
            }
            $conn = null;
        }
    }

    public function upload_pic($id)
{
    if (isset($_POST['upload'])) {  
        $userid = intval($id);

        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];

        $location = "..\\assets\\user_upload\\" . $file_name;

        if ($file_size < 524880) {
            if (move_uploaded_file($file_temp, $location)) {
                try {
                    $conn = $this->openConnection();
                    $stmt = $conn->prepare("UPDATE users SET photo = :location WHERE ID = :userid");
                    $stmt->bindParam(':location', $location);
                    $stmt->bindParam(':userid', $userid);
                    $stmt->execute();

                    echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Image Uploaded',
                                showConfirmButton: false,
                                timer: 2000,
                                showClass: {
                                    popup: 'swal2-show'
                                }
                            }).then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                } finally {
                    $conn = null;
                }
            } else {
                echo "<script>Swal.fire('Error', 'Failed to move the uploaded file', 'error');</script>";
            }
        } else {
            echo "<script>Swal.fire('Error', 'File size is too large to upload', 'error');</script>";
        }
    }
}





    public function get_users()
    {
        $conn = $this->openConnection();
        $stmt = $conn->prepare("SELECT * FROM users ORDER BY lastName ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_suppliers()
    {
        $conn = $this->openConnection();
        $stmt = $conn->prepare("SELECT * FROM suppliers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getID()
    {
        $conn = $this->openConnection();
        $userid = $_SESSION['ID'] ?? '';
        $stmt = $conn->prepare("SELECT * FROM users WHERE ID =:uid");
        $stmt->bindParam('uid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uploadID()
    {
        $conn = $this->openConnection();
        $userid = $_SESSION['ID'] ?? '';
        $stmt = $conn->prepare("SELECT ID FROM users WHERE ID =:uid");
        $stmt->bindParam('uid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function add_supplier()
    {

        if (isset($_POST['add_supplier'])) {
            $supplier_name = $_POST["supplier_name"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];

            $pdo = $this->openConnection();

            $sql = "INSERT INTO suppliers SET supplier_name = :supplier_name, description = :description, address = :address, contact = :contact";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'supplier_name' => $supplier_name,
                'description' => $description,
                'address' => $address,
                'contact' => $contact
            ]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Supplier added successfully',
                showConfirmButton: false,
                timer: 2000,
                showClass: {
                    popup: 'swal2-show'
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to add supplier',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
            </script>";
            }
        }
    }

    public function edit_supplier()
    {
        if (isset($_POST['update'])) {
            $supplier_id = $_POST['supplier_id'] ?? '';
            $supplier_name = $_POST["supplier_name"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];


            $pdo = $this->openConnection();

            $sql = "UPDATE suppliers SET supplier_id = :supplier_id , supplier_name = :supplier_name, description = :description, address = :address, contact = :contact WHERE supplier_id = :supplier_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'supplier_id' => $supplier_id,
                'supplier_name' => $supplier_name,
                'description' => $description,
                'address' => $address,
                'contact' => $contact,

            ]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Supplier edited successfully',
                showConfirmButton: false,
                timer: 2000,
                showClass: {
                    popup: 'swal2-show'
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to edit supplier',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
            </script>";
            }
        }
    }

    public function update_user()
    {
        if (isset($_POST['update'])) {
            $userid = $_POST['ID'] ?? '';
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $username = $_POST["username"];
            $mobile = $_POST["mobile"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $role = $_POST["role"];

            $pdo = $this->openConnection();

            $sql = "UPDATE users SET firstName = :firstName, lastName = :lastName, username = :username, mobile = :mobile, email = :email, address = :address, role = :role WHERE id = :uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $username,
                'mobile' => $mobile,
                'email' => $email,
                'address' => $address,
                'role' => $role,
                'uid' => $userid
            ]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User edited successfully',
                showConfirmButton: false,
                timer: 2000,
                showClass: {
                    popup: 'swal2-show'
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to edit user',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
            </script>";
            }
        }
    }

    public function delete_user()
    {
        if (isset($_REQUEST['delete'])) {
            $uid = $_GET['ID'] ?? '';

            $pdo = $this->openConnection();
            $sql = "DELETE FROM users where id=:uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['uid' => $uid]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User removed successfully',
                confirmButtonColor: '#3085d6',
                customClass: {
                    confirmButton: '#3085d6',
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to remove user',
                    confirmButtonColor: '#3085d6',
                    customClass: {
                        confirmButton: '#3085d6',
                    }
                });
            </script>";
            }

        }
    }

    public function delete_supp()
    {
        if (isset($_REQUEST['delete'])) {
            $supplier_id = $_GET['supplier_id'] ?? '';

            $pdo = $this->openConnection();
            $sql = "DELETE FROM suppliers where supplier_id =:supplier_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':supplier_id' => $supplier_id]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Supplier removed successfully',
                confirmButtonColor: '#3085d6',
                customClass: {
                    confirmButton: '#3085d6',
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to remove supplier',
                    confirmButtonColor: '#3085d6',
                    customClass: {
                        confirmButton: '#3085d6',
                    }
                });
            </script>";
            }

        }
    }
}
$store = new Langgam();