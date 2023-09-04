<div>

    <div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog pt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelNew">New Account</h5>
                    <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="registration-form">
                        <div class="pt-3" id="alerts"></div>
                        <div class="form-group row justify-content-center">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="firstName" 
                                    placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <input type="text" class="form-control" id="username" name="username" minlength="6"
                                placeholder="Username (minimum 6 characters)" required>
                            <span id="username-message"></span>
                        </div>
                        <div class="form-group pt-2">
                            <input type="password" class="form-control" id="password" name="password" minlength="8"
                                placeholder="Password (minimum 8 characters)" required>
                        </div>
                        <div class="form-group pt-2">
                            <input type="password" class="form-control" id="confirm" name="confirm"
                                placeholder="Confirm Password" required>
                            <span id="confirm-message"></span>
                        </div>
                        <div class="form-group pt-2">
                            <input type="tel" class="form-control" id="mobile" name="mobile" pattern="0\d{10}"
                                placeholder="Mobile Number" required>
                            <span id="mobile-message"></span>
                        </div>
                        <div class="form-group pt-2">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                                required>
                            <span id="email-message"></span>
                        </div>
                        <div class="form-group pt-2">
                            <textarea class="form-control" id="address" name="address" placeholder="Address"
                                required></textarea>
                        </div>
                        <div class="form-group pt-2 pb-4">
                            <select class="form-control" id="role" name="role" required>
                                <option value="">--Select Role--</option>
                                <option value="Employee">Employee</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="footClose" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="btn btn-primary">Add Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="../../../branch2/includes/acc_check.js"></script>

