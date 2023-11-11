<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    $email = ($_POST['email']);
    $mail = new PHPMailer(true);
    
    // Use SMTP for sending emails
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'agl.systems.info@gmail.com';
    $mail->Password = 'xbqlmyrythaaanwe';
    $mail->SMTPSecure = 'ssl'; // You can also use 'tls'
    $mail->Port = 465; // For SSL, or 587 for TLS

    //Email
    $mail->setFrom('agl.systems.info@gmail.com','NOAC Materials Trading Corporation');
    $mail->addAddress($email);
    $mail->isHTML(true);
    
    $mail->Subject = 'Change Password Link';
    $mail->Body = '
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        #openModalLink {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }

        #openModalLink:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Password Reset</h1>
        <p>Click the button below to change your password:</p>
        <p><a href="https://langgamtrading-system.000webhostapp.com/branch2/pages/change_password.php" id="openModalLink">Change Password</a></p>
    </div>
</body>
</html>';


    // Send the email
    if ($mail->send()) {
        // Email sent successfully
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Email Sent',
            text: 'The Verification Code has been sent to your inbox.',
            showConfirmButton: false,
            timer: 2000,
            showClass: {
                popup: 'swal2-show'
            }
        })
        </script>";
    } else {
        // Email sending failed
        echo '<script>
            Swal.fire({
            icon: "error",
            title: "Email Sending Failed",
            text: "An error occurred while sending the email. Please try again later.",
            showConfirmButton: false,
            timer: 2000,
            showClass: {
                popup: "swal2-show"
            }
            });
        </script>';
    }
}
?>
