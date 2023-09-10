<?php
require_once('storeclass.php');
require_once('../branch3/includes/users_function.php');

session_start();
$store = new Langgam();
$users = new Users();

$conn = $store->openConnection();

// Check if the user is logged in before trying to log them out
if (isset($_SESSION['ID'])) {
    $user_id = $_SESSION['ID'];
    $users = $users->getID();

    $name = ($users[0]->firstName . ' ' . $users[0]->lastName);
    $username = $users[0]->username;
    $role = $users[0]->role;

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser_info = get_browser($user_agent, true);

    // Extract browser name and version
    $browser = $browser_info['browser'];

    function getDeviceType($user_agent)
    {
        $user_agent = strtolower($user_agent);
        if (strpos($user_agent, 'iphone') !== false) {
            return 'iPhone';
        } elseif (strpos($user_agent, 'ipad') !== false) {
            return 'iPad';
        } elseif (strpos($user_agent, 'android') !== false) {
            return 'Mobile';
        } elseif (strpos($user_agent, 'tablet') !== false) {
            return 'Tablet';
        } elseif (strpos($user_agent, 'macbook') !== false) {
            return 'MacBook';
        } elseif (strpos($user_agent, 'macintosh') !== false) {
            return 'Mac';
        } elseif (strpos($user_agent, 'windows') !== false || strpos($user_agent, 'linux') !== false) {
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
        'action' => 'Logged Out',
        'browser' => $browser,
        'device' => $device,
        'device_os' => $deviceOS
    ]);

    // Destroy the session
    session_destroy();
}

header("Location: \langgamtrading\index.php");
exit();
