<?php

class Users {
    public function getID()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $userid = $_SESSION['ID'] ?? '';
        $stmt = $conn->prepare("SELECT * FROM branch3_users WHERE ID =:uid");
        $stmt->bindParam('uid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_users()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_users");
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

            $sql = "UPDATE branch3_users SET firstName = :firstName, lastName = :lastName, username = :username, mobile = :mobile, email = :email, address = :address, role = :role WHERE id = :uid";
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
        $users = new Users;

        if (isset($_REQUEST['delete'])) {
            $uid = $_GET['ID'] ?? '';
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $user_id = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $fullname = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch3_users where id=:uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['uid' => $uid]);

            if ($stmt->rowCount() !== false) {
                date_default_timezone_set('Asia/Manila');

                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Removed an Account",
                    'user_id' => $user_id,
                    'username' => $username,
                    'full_name' =>$fullname,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Accounts',
                    'record_id' => $uid
                ]);
            }

        }
    }
}
$users = new Users();