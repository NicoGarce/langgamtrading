<?php
require_once('storeclass.php');
class Login
{

    public function login() //LOGIN FUNCTION
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
                    $user_id = $user['ID'];
                    $name = $user['firstName'] . ' ' . $user['lastName'];
                    $username = $user['username'];
                    $role = $user['role'];

                    $user_agent = $_SERVER['HTTP_USER_AGENT'];
                    $browser_info = get_browser($user_agent, true);

                    // Extract browser name and version
                    $browser = $browser_info['browser'];

                    // Function to detect device type
                    function getDeviceType($user_agent)
                    {
                        $user_agent = strtolower($user_agent);
                        if (strpos($user_agent, 'iphone') !== false) {
                            return 'iPhone';
                        } elseif (strpos($user_agent, 'ipad') !== false){
                            return 'iPad';
                        } elseif (strpos($user_agent, 'android') !== false) {
                            return 'Mobile';
                        } elseif (strpos($user_agent, 'tablet') !== false) {
                            return 'Tablet';
                        } elseif (strpos($user_agent, 'macbook') !== false) {
                            return 'MacBook';
                        } elseif (strpos($user_agent, 'macintosh') !== false) {
                            return 'Mac';
                        } elseif (strpos($user_agent, 'windows') !== false || strpos($user_agent, 'linux') !== false){
                            return 'Desktop';
                        }
                    }

                    function getDeviceOS($user_agent)
                    {
                        $user_agent = strtolower($user_agent);

                        if (strpos($user_agent, 'iphone') !== false) {
                            return 'iOS';
                        } elseif (strpos($user_agent, 'ipad') !== false) {
                            return 'iOS';
                        } elseif (strpos($user_agent, 'windows') !== false) {
                            return 'Windows';
                        } elseif (strpos($user_agent, 'android') !== false) {
                            return 'Android';
                        } elseif (strpos($user_agent, 'mac os x') !== false || strpos($user_agent, 'macintosh') !== false) {
                            return 'macOS';
                        } elseif (strpos($user_agent, 'linux') !== false) {
                            return 'Linux';
                        } else {
                            return 'Unknown';
                        }
                    }
                    // Detect device type based on the user agent
                    $device = getDeviceType($user_agent);
                    $deviceOS = getDeviceOS($user_agent);

                    // Insert the extracted information into the database
                    $log = "INSERT INTO branch1_user_logs (user_id, name, username, role, action, browser, device, device_os) VALUES (:user_id, :name, :username, :role, :action, :browser, :device, :device_os)";
                    $stmt = $conn->prepare($log);
                    $stmt->execute([
                        'user_id' => $user_id,
                        'name' => $name,
                        'username' => $username,
                        'role' => $role,
                        'action' => 'Logged In',
                        'browser' => $browser,
                        'device' => $device,
                        'device_os' => $deviceOS
                    ]);



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
                    $user_id = $user['ID'];
                    $name = $user['firstName'] . ' ' . $user['lastName'];
                    $username = $user['username'];
                    $role = $user['role'];

                    $user_agent = $_SERVER['HTTP_USER_AGENT'];
                    $browser_info = get_browser($user_agent, true);

                    // Extract browser name and version
                    $browser = $browser_info['browser'];

                    function getDeviceType($user_agent)
                    {
                        $user_agent = strtolower($user_agent);
                        if (strpos($user_agent, 'iphone') !== false) {
                            return 'iPhone';
                        } elseif (strpos($user_agent, 'ipad') !== false){
                            return 'iPad';
                        } elseif (strpos($user_agent, 'android') !== false) {
                            return 'Mobile';
                        } elseif (strpos($user_agent, 'tablet') !== false) {
                            return 'Tablet';
                        } elseif (strpos($user_agent, 'macbook') !== false) {
                            return 'MacBook';
                        } elseif (strpos($user_agent, 'macintosh') !== false) {
                            return 'Mac';
                        } elseif (strpos($user_agent, 'windows') !== false || strpos($user_agent, 'linux') !== false){
                            return 'Desktop';
                        }
                    }

                    function getDeviceOS($user_agent)
                    {
                        $user_agent = strtolower($user_agent);

                        if (strpos($user_agent, 'iphone') !== false) {
                            return 'iOS';
                        } elseif (strpos($user_agent, 'ipad') !== false) {
                            return 'iOS';
                        } elseif (strpos($user_agent, 'windows') !== false) {
                            return 'Windows';
                        } elseif (strpos($user_agent, 'android') !== false) {
                            return 'Android';
                        } elseif (strpos($user_agent, 'mac os x') !== false || strpos($user_agent, 'macintosh') !== false) {
                            return 'macOS';
                        } elseif (strpos($user_agent, 'linux') !== false) {
                            return 'Linux';
                        } else {
                            return 'Unknown';
                        }
                    }
                    // Detect device type based on the user agent
                    $device = getDeviceType($user_agent);
                    $deviceOS = getDeviceOS($user_agent);

                    // Insert the extracted information into the database
                    $log = "INSERT INTO branch2_user_logs (user_id, name, username, role, action, browser, device, device_os) VALUES (:user_id, :name, :username, :role, :action, :browser, :device, :device_os)";
                    $stmt = $conn->prepare($log);
                    $stmt->execute([
                        'user_id' => $user_id,
                        'name' => $name,
                        'username' => $username,
                        'role' => $role,
                        'action' => 'Logged In',
                        'browser' => $browser,
                        'device' => $device,
                        'device_os' => $deviceOS
                    ]);

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
                    $user_id = $user['ID'];
                    $name = $user['firstName'] . ' ' . $user['lastName'];
                    $username = $user['username'];
                    $role = $user['role'];

                    $user_agent = $_SERVER['HTTP_USER_AGENT'];
                    $browser_info = get_browser($user_agent, true);

                    // Extract browser name and version
                    $browser = $browser_info['browser'];

                    function getDeviceType($user_agent)
                    {
                        $user_agent = strtolower($user_agent);
                        if (strpos($user_agent, 'iphone') !== false) {
                            return 'iPhone';
                        } elseif (strpos($user_agent, 'ipad') !== false){
                            return 'iPad';
                        } elseif (strpos($user_agent, 'android') !== false) {
                            return 'Mobile';
                        } elseif (strpos($user_agent, 'tablet') !== false) {
                            return 'Tablet';
                        } elseif (strpos($user_agent, 'macbook') !== false) {
                            return 'MacBook';
                        } elseif (strpos($user_agent, 'macintosh') !== false) {
                            return 'Mac';
                        } elseif (strpos($user_agent, 'windows') !== false || strpos($user_agent, 'linux') !== false){
                            return 'Desktop';
                        }
                    }

                    function getDeviceOS($user_agent)
                    {
                        $user_agent = strtolower($user_agent);

                        if (strpos($user_agent, 'iphone') !== false) {
                            return 'iOS';
                        } elseif (strpos($user_agent, 'ipad') !== false) {
                            return 'iOS';
                        } elseif (strpos($user_agent, 'windows') !== false) {
                            return 'Windows';
                        } elseif (strpos($user_agent, 'android') !== false) {
                            return 'Android';
                        } elseif (strpos($user_agent, 'mac os x') !== false || strpos($user_agent, 'macintosh') !== false) {
                            return 'macOS';
                        } elseif (strpos($user_agent, 'linux') !== false) {
                            return 'Linux';
                        } else {
                            return 'Unknown';
                        }
                    }
                    // Detect device type based on the user agent
                    $device = getDeviceType($user_agent);
                    $deviceOS = getDeviceOS($user_agent);

                    // Insert the extracted information into the database
                    $log = "INSERT INTO branch3_user_logs (user_id, name, username, role, action, browser, device, device_os) VALUES (:user_id, :name, :username, :role, :action, :browser, :device, :device_os)";
                    $stmt = $conn->prepare($log);
                    $stmt->execute([
                        'user_id' => $user_id,
                        'name' => $name,
                        'username' => $username,
                        'role' => $role,
                        'action' => 'Logged In',
                        'browser' => $browser,
                        'device' => $device,
                        'device_os' => $deviceOS
                    ]);

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
