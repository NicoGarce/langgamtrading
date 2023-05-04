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
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $conn = $this->openConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {

                // Get the user's role from the query result and store it in a session variable
                $user = $stmt->fetch();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['role'] = $user['role'];

                    // Redirect the user to the appropriate dashboard based on their role
                    if ($_SESSION['role'] == "Administrator") {
                        header("Location: pages/admin/admin_dashboard.php");
                    } else if ($_SESSION['role'] == "Employee") {
                        header("Location: pages/employee/emp_dashboard.php");
                    }
                } else {
                    // Display an error message if the password is incorrect
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password is Incorrect',
                    })
                </script>";
                }

            } else {
                // Display an error message if the username is incorrect
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Username is Incorrect',
                })
            </script>";
            }
        }
    }



    public function add_user()
    {
        if (isset($_POST['add'])) {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $mobile = $_POST["mobile"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $role = $_POST["role"];

            $pdo = $this->openConnection();

            $sql = "SELECT * FROM users WHERE username=:username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);


            $sql = "INSERT INTO users (firstName, lastName, username, password, mobile, email, address, role) VALUES (:firstName, :lastName, :username, :password, :mobile, :email, :address, :role)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $username,
                'password' => $password,
                'mobile' => $mobile,
                'email' => $email,
                'address' => $address,
                'role' => $role
            ]);

            if ($stmt->rowCount() > 0) {
                $message = "User added successfully.";
                echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: '$message',
                            })
                        </script>";
            } else {
                $message = "Error: Unable to add user.";
                echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '$message',
                            })
                        </script>";
            }

            $pdo = null;
        }
    }


}
$store = new Langgam();