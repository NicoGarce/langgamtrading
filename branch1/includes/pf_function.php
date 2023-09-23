<?php

require_once('users_function.php');


class Profile{
    public function upload_pic($id)//UPLOAD PIC FUNCTION
    {   
        $store = new Langgam;
        if (isset($_POST['upload'])) {
            $userid = intval($id);

            $file_name = $_FILES['file']['name'];
            $file_temp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $loc = "../";
            $location = "../assets/user_upload/" . $file_name;

            // Check if it is an image
            if (getimagesize($file_temp)) {
                // Get the dimensions of the image
                $imageSize = getimagesize($file_temp);
                $width = $imageSize[0];
                $height = $imageSize[1];

                // Check if it's a square image
                if ($width === $height) {
                    if ($file_size < 5120000) {
                        if (move_uploaded_file($file_temp, $loc.$location)) {
                            try {
                                $conn = $store->openConnection();
                                $stmt = $conn->prepare("UPDATE branch1_users SET photo = :location WHERE ID = :userid");
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
                        echo "<script>Swal.fire('Error', 'File size is too large to upload. Required size 5mb', 'error');</script>";
                    }
                } else {
                    echo "<script>Swal.fire('Error', 'Please upload a 1x1 (square) image', 'error');</script>";
                }
            } else {
                echo "<script>Swal.fire('Error', 'Please upload an image file', 'error');</script>";
            }
        }
    }

    public function edit_profile(){
        $store = new Langgam();


        if (isset($_POST['update'])) {
            
            $userid = $_POST['ID'] ?? '';
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $mobile = $_POST["mobile"];
            $address = $_POST["address"];

            $pdo = $store->openConnection();

            $sql = "UPDATE branch1_users SET firstName = :firstName, lastName = :lastName,  mobile = :mobile, address = :address WHERE id = :uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'mobile' => $mobile,
                'address' => $address,
                'uid' => $userid
            ]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Profile Edited Successfully',
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
                    text: 'Unable to edit profile',
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
}

$profile = new Profile();