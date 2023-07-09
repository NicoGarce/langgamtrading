<div>

    <div class="modal fade pt-5" id="addSupplier" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog pt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelNew">New Supplier</h5>
                    <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="registration-form">
                        <div class="form-group row justify-content-center">
                            <div class="form-group pt-2">
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Supplier Name" required>
                            </div>
                            <div class="form-group pt-2">
                                <textarea class="form-control" id="description" name="description"
                                placeholder="Description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                                <textarea class="form-control" id="address" name="address"
                                placeholder="Address" required></textarea>
                        </div>
                        <div class="form-group pt-2 pb-4">
                            <input type="tel" class="form-control" id="Contact" name="contact" placeholder="Contact Info" required>
                            <span id="mobile-message"></span>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" id="footClose" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_supplier" class="btn btn-primary">Add Supplier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $store->add_supplier(); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



