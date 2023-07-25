<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
    data-bs-target="#editProduct<?php echo $cnt ?>">
    <i class='bx bx-edit'></i></button>

<div class="modal fade" id="editProduct<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog pt-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelEdit">Edit Product</h5>
                <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="registration-form<?php echo $cnt ?>">

                    <input name="ID" value="<?php echo $result->product_id ?>" type="hidden">

                    <div class="form-group row justify-content-center">
                        <div class="form-group col-sm-5">
                            <label for="product_id" class="label small px-1">Product ID</label>
                            <input type="text" class="form-control" id="product_id<?php echo $cnt ?>"
                            name="product_id" value="<?php echo $result->product_id ?>" placeholder="Product ID" required readonly>
                        </div>
                        <div class="form-group pt-2">
                            <label for="product_name" class="label small px-1">Product Name</label>
                            <input type="text" class="form-control" id="product_name<?php echo $cnt ?>"
                                name="product_name" value="<?php echo $result->product_name ?>"
                                placeholder="Product Name" required>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="form-group col-md-6">
                                <label for="quantity" class="label small px-1">Quantity</label>
                                <input type="text" class="form-control" id="quantity<?php echo $cnt ?>"
                                    name="quantity" value="<?php echo $result->quantity ?>"
                                    placeholder="Quantity" required>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="price" class="label small px-1">Price</label>
                                <input type="text" class="form-control" id="price<?php echo $cnt ?>"
                                    name="price" value="<?php echo $result->price ?>"
                                    placeholder="Price" required>
                        </div>
                    </div>

                    <div class="form-group pt-2">
                        <label for="category" class="label small px-1">Category</label>
                        <input type="text" class="form-control" id="category<?php echo $cnt ?>"
                            name="category" value="<?php echo $result->category ?>"
                            placeholder="Category" required>
                    </div>
                    
                    <div class="form-group pt-2">
                        <label for="date_ordered" class="label small px-1">Date Ordered</label>
                        <input type="date" class="form-control" id="date_ordered" name="date_ordered"
                        placeholder="Date Ordered" value="<?php echo $result->date_ordered ?>" required>
                    </div>

                    <div class="form-group pt-2">
                        <label for="date_arrival" class="label small px-1">Date of Arrival</label>
                        <input type="date" class="form-control" id="date_arrival" name="date_arrival"
                            placeholder="Date Arrival" value="<?php echo $result->date_arrival ?>" required>
                    </div>

                    <?php
                        $suppliers = $store->get_suppliers();
                    ?>
                    <div class="form-group pt-2 pb-4">
                        <label for="supplier_id" class="label small px-1">Supplier</label>
                        <select class="form-control" id="supplier_id" name="supplier_id" required>
                            <?php
                            foreach ($suppliers as $supplier) {
                                $selected = ($supplier->supplier_id == $result->supplier_id) ? "selected" : ""; // Check if the current supplier is the one in the database
                                echo '<option value="' . $supplier->supplier_id . '" ' . $selected . '>' . $supplier->supplier_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="button" id="footClose<?php echo $cnt ?>" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Edit Product</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>