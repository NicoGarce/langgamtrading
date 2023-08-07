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
            echo "There is a problem with the connection: " . $e->getMessage();
            return null; // Return NULL when there is an exception
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
            $branch = $_POST['branch'];

            $conn = $this->openConnection();
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
$store = new Langgam();