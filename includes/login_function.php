<?php
require_once('storeclass.php');
class Login{

    public function login()//LOGIN FUNCTION
    {
        session_start();
        $store = new Langgam();
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $branch = $_POST['branch'];

            $conn = $store->openConnection();
            if ($branch == 0) {
                echo '<div class="alert alert-danger text-center p-2 px-2 small">
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
                    $userid = $user['ID'];
                    $role = $user['role'];

                    if (password_verify($password, $user['password'])) {

                        $_SESSION['role'] = $user['role'];

                        // Redirect the user to the appropriate dashboard based on their role
                        if ($_SESSION['role'] == "Administrator") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['ID'] = $user['ID'];
                            header("Location: branch1/pages/admin/admin_dashboard.php");
                            exit;
                        } else if ($_SESSION['role'] == "Employee") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['ID'] = $user['ID'];
                            header("Location: branch1/pages/employee/emp_dashboard.php");
                            exit;
                        }
                    } else {
                        // Display an error message if the password is incorrect
                        echo '<div class="alert alert-danger fade show text-center p-2 px-2 small">
                            <strong>Incorrect Password</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          </div>';
                    }
                } else {
                    // Display an error message if the username is incorrect
                    echo '<div class="alert alert-danger text-center p-2 px-2 small">
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
                    $userid = $user['ID'];
                    $role = $user['role'];

                    if (password_verify($password, $user['password'])) {

                        $_SESSION['role'] = $user['role'];

                        // Redirect the user to the appropriate dashboard based on their role
                        if ($_SESSION['role'] == "Administrator") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['ID'] = $user['ID'];
                            header("Location: branch2/pages/admin/admin_dashboard.php");
                            exit;
                        } else if ($_SESSION['role'] == "Employee") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['ID'] = $user['ID'];
                            header("Location: branch2/pages/employee/emp_dashboard.php");
                            exit;
                        }
                    } else {
                        // Display an error message if the password is incorrect
                        echo '<div class="alert alert-danger fade show text-center p-2 px-2 small">
                                <strong>Incorrect Password</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                    }
                } else {
                    // Display an error message if the username is incorrect
                    echo '<div class="alert alert-danger text-center p-2 px-2 small">
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
                    $userid = $user['ID'];
                    $role = $user['role'];

                    if (password_verify($password, $user['password'])) {

                        $_SESSION['role'] = $user['role'];

                        // Redirect the user to the appropriate dashboard based on their role
                        if ($_SESSION['role'] == "Administrator") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['ID'] = $user['ID'];
                            header("Location: branch3/pages/admin/admin_dashboard.php");
                            exit;
                        } else if ($_SESSION['role'] == "Employee") {
                            $_SESSION['m_un'] = $username;
                            $_SESSION['access'] = $role;
                            $_SESSION['ID'] = $user['ID'];
                            header("Location: branch3/pages/employee/emp_dashboard.php");
                            exit;
                        }
                    } else {
                        // Display an error message if the password is incorrect
                        echo '<div class="alert alert-danger fade show text-center p-2 px-2 small">
                                <strong>Incorrect Password</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                    }
                } else {
                    // Display an error message if the username is incorrect
                    echo '<div class="alert alert-danger text-center p-2 px-2 small">
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