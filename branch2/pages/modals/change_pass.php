<div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelEdit">Change Password</h5>
                <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit-reg-form">
                    <input id="ID" name="ID" value="<?php echo $result[0]->order_id ?>" type="hidden">
                    
                    <div class="pt-2 pb-2">
                        <input type="password" id="old-pass" name="old-pass" class="form-control" placeholder="Enter Old Password">
                        <span id="old-pass-msg"></span>
                    </div>
                    <hr>
                    <div class="pt-2 pb-4">
                        <div class="pb-2">
                            <input type="password" id="new-pass" name="new-pass" class="form-control" placeholder="Enter New Password" disabled>
                        </div>
                        <div>
                            <input type="password" id="confirm-new" name="confirm-new" class="form-control" placeholder="Confirm New Password" disabled>
                            <span id="confirm-message"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="change" id="change" class="btn btn-dark" disabled>Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../branch2/includes/change_pass.js"></script>