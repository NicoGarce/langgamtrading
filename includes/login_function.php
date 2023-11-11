<?php
require_once('storeclass.php');
session_start();
class Login
{

    public function login() //LOGIN FUNCTION
    {
        $store = new Langgam();
        date_default_timezone_set('Asia/Manila');
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $branch = $_POST['branch'];

            $conn = $store->openConnection();
            if ($branch == 0) {
                echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                        <strong>Please select a branch</strong>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                    </div>';
            }
            // Check the appropriate table based on the selected branch
            elseif ($branch == 1) {
                $stmt = $conn->prepare("SELECT * FROM branch1_users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {

                    $user = $stmt->fetch();
                    $user_id = $user['ID'];
                    $name = $user['firstName'] . ' ' . $user['lastName'];
                    $username = $user['username'];
                    $role = $user['role'];
                    $userBranch = $user['branch'];
    
                    $log_time = date('H:i:s');
                    $log_date = date('Y-m-d');
                    
                    // Insert the extracted information into the database
                    $log = "INSERT INTO branch1_user_logs (user_id, name, username, role, action, log_time, log_date) VALUES (:user_id, :name, :username, :role, :action, :log_time, :log_date)";
                    $stmt = $conn->prepare($log);
                    $stmt->execute([
                        'user_id' => $user_id,
                        'name' => $name,
                        'username' => $username,
                        'role' => $role,
                        'action' => 'Logged In',
                        'log_time' => $log_time,
                        'log_date' => $log_date
                    ]);



                    if (password_verify($password, $user['password'])) {

                        $_SESSION['role'] = $user['role'];

                        // Redirect the user to the appropriate dashboard based on their role
                        if ($_SESSION['role'] == "Administrator") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['branch'] = $userBranch;
                            $_SESSION['ID'] = $user['ID'];
                            echo '<script>window.location.href = "./branch1/pages/admin/admin_dashboard.php";</script>';
                            exit;
                        } else if ($_SESSION['role'] == "Employee") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['branch'] = $userBranch;
                            $_SESSION['ID'] = $user['ID'];
                            echo '<script>window.location.href = "./branch1/pages/employee/emp_dashboard.php";</script>';
                            exit;
                        }
                    } else {
                        // Display an error message if the password is incorrect
                        echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                                <strong>Incorrect Password</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                    }
                } else {
                    // Display an error message if the username is incorrect
                    echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                            <strong>No such user is registered</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
                }
            } else if ($branch == 2) {
                $stmt = $conn->prepare("SELECT * FROM branch2_users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {

                    $user = $stmt->fetch();
                    $user_id = $user['ID'];
                    $name = $user['firstName'] . ' ' . $user['lastName'];
                    $username = $user['username'];
                    $role = $user['role'];
                    $userBranch = $user['branch'];
                    
                    $log_time = date('H:i:s');
                    $log_date = date('Y-m-d');

                    // Insert the extracted information into the database
                    $log = "INSERT INTO branch2_user_logs (user_id, name, username, role, action, log_time, log_date) VALUES (:user_id, :name, :username, :role, :action, :log_time, :log_date)";
                    $stmt = $conn->prepare($log);
                    $stmt->execute([
                        'user_id' => $user_id,
                        'name' => $name,
                        'username' => $username,
                        'role' => $role,
                        'action' => 'Logged In',
                        'log_time' => $log_time,
                        'log_date' => $log_date
                    ]);

                    if (password_verify($password, $user['password'])) {

                        $_SESSION['role'] = $user['role'];

                        // Redirect the user to the appropriate dashboard based on their role
                        if ($_SESSION['role'] == "Administrator") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['branch'] = $userBranch;
                            $_SESSION['ID'] = $user['ID'];
                            echo '<script>window.location.href = "./branch2/pages/admin/admin_dashboard.php";</script>';
                            exit;
                        } else if ($_SESSION['role'] == "Employee") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['branch'] = $userBranch;
                            $_SESSION['ID'] = $user['ID'];
                            echo '<script>window.location.href = "./branch2/pages/employee/emp_dashboard.php";</script>';
                            exit;
                        }
                    } else {
                        // Display an error message if the password is incorrect
                        echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                                <strong>Incorrect Password</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                    }
                } else {
                    // Display an error message if the username is incorrect
                    echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                            <strong>No such user is registered</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
                }
            } else if ($branch == 3) {
                $stmt = $conn->prepare("SELECT * FROM branch3_users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {

                    $user = $stmt->fetch();
                    $user_id = $user['ID'];
                    $name = $user['firstName'] . ' ' . $user['lastName'];
                    $username = $user['username'];
                    $role = $user['role'];
                    $userBranch = $user['branch'];

                    $log_time = date('H:i:s');
                    $log_date = date('Y-m-d');

                    // Insert the extracted information into the database
                    $log = "INSERT INTO branch3_user_logs (user_id, name, username, role, action, log_time, log_date) VALUES (:user_id, :name, :username, :role, :action, :log_time, :log_date)";
                    $stmt = $conn->prepare($log);
                    $stmt->execute([
                        'user_id' => $user_id,
                        'name' => $name,
                        'username' => $username,
                        'role' => $role,
                        'action' => 'Logged In',
                        'log_time' => $log_time,
                        'log_date' => $log_date
                    ]);

                    if (password_verify($password, $user['password'])) {

                        $_SESSION['role'] = $user['role'];

                        // Redirect the user to the appropriate dashboard based on their role
                        if ($_SESSION['role'] == "Administrator") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['branch'] = $userBranch;
                            $_SESSION['ID'] = $user['ID'];
                            echo '<script>window.location.href = "./branch3/pages/admin/admin_dashboard.php";</script>';
                            exit;
                        } else if ($_SESSION['role'] == "Employee") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['branch'] = $userBranch;
                            $_SESSION['ID'] = $user['ID'];
                            echo '<script>window.location.href = "./branch3/pages/employee/emp_dashboard.php";</script>';
                            exit;
                        }
                    } else {
                        // Display an error message if the password is incorrect
                        echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                                <strong>Incorrect Password</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                    }
                } else {
                    // Display an error message if the username is incorrect
                    echo '<div class="alert alert-danger col-11 col-md-8 col-lg-8 mx-auto text-center p-2 px-2 small">
                            <strong>No such user is registered</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
                }
            }
            $conn = null;
        }
    }
}
$login = new Login();