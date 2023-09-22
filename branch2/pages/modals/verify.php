<?php
require('../../branch2/includes/send.php');
?>
<div class="modal fade" id="verify" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelEdit">Change Password</h5>
                <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="send-email">

                    <div class="pt-1 pb-4 form-group">
                        <label class="label small" for="email">Email</label>
                        <input type="email" id="email" name="email" readonly class="form-control" value="<?php echo $result[0]->email ?>">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" id="send-btn" name='send' class="btn btn-primary">Send Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>