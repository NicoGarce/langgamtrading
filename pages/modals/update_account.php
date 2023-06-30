<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAccount<?php echo $cnt ?>">
    <i class='bx bx-edit'></i></button>


<div class="modal fade pt-5" id="editAccount<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog pt-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelEdit">Edit Account
                    <?php echo $result->ID ?>
                </h5>
                <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="registration-form<?php echo $cnt ?>">
                    <input name="ID" value="<?php echo $result->ID ?>" type="hidden">
                    <div class="form-group row justify-content-center">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="firstName<?php echo $cnt ?>" name="firstName"
                                value="<?php echo $result->firstName ?>" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="lastName<?php echo $cnt ?>" name="lastName"
                                value="<?php echo $result->lastName ?>" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <input type="text" class="form-control" id="username<?php echo $cnt ?>" name="username"
                            minlength="6" value="<?php echo $result->username ?>"
                            placeholder="Username (minimum 6 characters)" required>
                        <span id="username-message<?php echo $cnt ?>"></span>
                    </div>

                    <div class="form-group pt-2">
                        <input type="tel" class="form-control" id="mobile<?php echo $cnt ?>" name="mobile"
                            pattern="0\d{10}" value="<?php echo $result->mobile ?>" placeholder="Mobile Number"
                            required>
                        <span id="mobile-message<?php echo $cnt ?>"></span>
                    </div>
                    <div class="form-group pt-2">
                        <input type="email" class="form-control" id="email<?php echo $cnt ?>" name="email"
                            placeholder="Email Address" value="<?php echo $result->email ?>" required>
                        <span id="email-message<?php echo $cnt ?>"></span>
                    </div>
                    <div class="form-group pt-2">
                        <textarea class="form-control" id="address<?php echo $cnt ?>" name="address"
                            placeholder="Address" required><?php echo $result->address ?></textarea>
                    </div>
                    <div class="form-group pt-2">
                        <select class="form-control" id="role<?php echo $cnt ?>" name="role" value="" required>
                            <option value="<?php echo $result->role ?>"><?php echo $result->role ?></option>
                            <option value="Employee">Employee</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="footClose<?php echo $cnt ?>" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Edit Account</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>