<?php
$userID = $users->getID();
$id = $userID[0]->ID;
$profile->upload_pic($id);
?>

<div class="modal fade pt-5" id="upload" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog pt-2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelEdit">Upload Photo | Choose a 1x1 Photo </h5>
                <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" id="upload-form">
                <div class="modal-body">
                    <div id="error-message" class="text-danger d-flex justify-content-center pb-2"></div>
                    <div class="pb-2 d-flex justify-content-center">
                        <img src="<?php echo (!empty($result[0]->photo)) ? '../' . $result[0]->photo : '/langgamtrading/assets/user_upload/default.png' ?>" alt="photo" id="display" class="img-fluid border border-2 rounded-circle" width="250px" height="250px">
                    </div>
                    <div class="d-flex justify-content-center mx-auto">
                        <label for="file" class="btn btn-primary">Choose Photo</label>
                        <input type="file" name="file" id="file" class="form-control" onchange="checkFile()" hidden>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="upload" class="btn btn-primary" disabled>Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function checkFile() {
        var fileInput = document.querySelector('input[name="file"]');
        var uploadButton = document.querySelector('button[name="upload"]');
        var errorMessage = document.getElementById('error-message');
        var profilePic = document.getElementById("display");

        if (fileInput.files.length > 0) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                    if (img.width === img.height) {
                        uploadButton.disabled = false;
                        errorMessage.innerText = '';
                        profilePic.src = URL.createObjectURL(fileInput.files[0]);
                    } else {
                        uploadButton.disabled = true;
                        errorMessage.innerText = 'Please choose a 1x1 photo.';
                    }
                };
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            uploadButton.disabled = true;
            errorMessage.innerText = '';
        }
    }

    function resetForm() {
        var fileInput = document.getElementById("file");
        var errorMessage = document.getElementById("error-message");
        var profilePic = document.getElementById("display");

        fileInput.value = "";
        errorMessage.innerText = "";
        document.getElementById("upload-form").reset();
        profilePic.src = "<?php echo (!empty($result[0]->photo)) ? '../' . $result[0]->photo : '/langgamtrading/assets/user_upload/default.png' ?>";
        document.querySelector('button[name="upload"]').disabled = true;
    }

    $(document).ready(function() {
        let inputFile = document.getElementById("file");

        inputFile.onchange = function() {
            checkFile();
        }

        $('#upload').on('hidden.bs.modal', function() {
            resetForm();
        });
    });
</script>