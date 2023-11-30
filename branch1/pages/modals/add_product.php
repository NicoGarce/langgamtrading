<div>

    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog pt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelNew">Add Product</h5>
                    <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="registration-form">

                        <div class="form-group pt-2">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
                        </div>

                        <div class="row pt-2">
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" oninput="if (this.value < 0 || this.value.includes('.')) this.value = 0;" required></input>
                            </div>
                            <div class="form-group col-md-6 ">
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price" required oninput="if (this.value < 0) this.value = 0;" step="any">
                            </div>
                        </div>

                        <div class="form-group pt-2">
                            <input type="text" class="form-control" id="category" name="category" placeholder="Category" required>
                        </div>
                        <div class="form-group pt-2">
                            <label for="date_ordered" class="label small px-1">Date Ordered</label>
                            <input type="date" class="form-control" id="date_ordered" name="date_ordered" placeholder="Date Ordered" required>
                        </div>
                        <div class="form-group pt-2">
                            <label for="date_arrival" class="label small px-1">Date of Arrival</label>
                            <input type="date" class="form-control" id="date_arrival" name="date_arrival" placeholder="Date Arrival" required>
                        </div>

                        <?php
                        $suppliers = $sups->get_suppliers();
                        ?>
                        <div class="form-group pt-2 pb-4">
                            <select class="form-control" id="supplier_id" name="supplier_id" required>
                                <option value="">--Select Supplier--</option>
                                <?php
                                foreach ($suppliers as $supplier) {
                                    echo '<option value="' . $supplier->supplier_id . '">' . $supplier->supplier_name . '</option>';
                                }
                                ?>
                            </select>
                        </div>


                        <div class="modal-footer">
                            <button type="button" id="footClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $inventory->add_product(); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>