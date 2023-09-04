<?php

class Users {
    public function getID()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $userid = $_SESSION['ID'] ?? '';
        $stmt = $conn->prepare("SELECT * FROM branch2_users WHERE ID =:uid");
        $stmt->bindParam('uid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_users()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function update_user()
    {
        $store = new Langgam();
        if (isset($_POST['update'])) {
            $userid = $_POST['ID'] ?? '';
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $username = $_POST["username"];
            $mobile = $_POST["mobile"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $role = $_POST["role"];

            $pdo = $store->openConnection();

            $sql = "UPDATE branch2_users SET firstName = :firstName, lastName = :lastName, username = :username, mobile = :mobile, email = :email, address = :address, role = :role WHERE id = :uid";
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
        $store = new Langgam();
        if (isset($_REQUEST['delete'])) {
            $uid = $_GET['ID'] ?? '';

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch2_users where id=:uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['uid' => $uid]);

        }
    }
}
$users = new Users();