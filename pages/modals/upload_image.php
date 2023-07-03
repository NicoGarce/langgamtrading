<?php
    $userID = $store->uploadID();
    $id = $userID[0]->ID;
    $store->upload_pic($id);
?>

<div class="modal fade pt-5" id="upload" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog pt-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelEdit">Upload Photo | Choose a 1x1 Photo </h5> 
                
                <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
