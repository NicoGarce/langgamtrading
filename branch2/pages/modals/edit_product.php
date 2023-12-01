<tbody>
    <?php
    $results = $inventory->get_inventory();

    $cnt = 1;
    if (count($results) > 0) {
        foreach ($results as $result) {
    ?>
            <tr class="<?php if ($result->stock == 0) echo 'bg-danger bg-gradient'; ?>">
                <td class="<?php if ($result->stock == 0) echo 'text-light'; ?>">
                    <?php echo htmlentities($result->product_name); ?>
                </td>

                <td class="text-center d-none d-sm-table-cell <?php if ($result->stock == 0) echo 'text-light'; ?>">
                    <?php echo htmlentities($result->stock); ?>
                </td>

                <td class="d-none d-sm-table-cell <?php if ($result->stock == 0) echo 'text-light'; ?>">
                    ₱<?php echo htmlentities($result->price); ?>
                </td>

                <td class="d-none d-sm-table-cell <?php if ($result->stock == 0) echo 'text-light'; ?>">
                    <?php echo htmlentities($result->category); ?>
                </td>

                <td class="d-none d-sm-table-cell <?php if ($result->stock == 0) echo 'text-light'; ?>">
                    <?php echo htmlentities($result->date_ordered); ?>
                </td>

                <td class="d-none d-sm-table-cell <?php if ($result->stock == 0) echo 'text-light'; ?>">
                    <?php echo htmlentities($result->date_arrival); ?>
                </td>

                <td style="width: 50px;">

                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editProduct<?php echo $cnt ?>" title="Edit Product">
                        <i class='bx bx-edit'></i></button>

                        <div class="modal fade" id="editProduct<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="labelEdit">Edit Product | Details</h5>
                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="registration-form<?php echo $cnt ?>">

                                        <input name="ID" value="<?php echo $result->product_id ?>" type="hidden">

                                        <div class="form-group row justify-content-center">
                                            <div class="form-group col-sm-5">
                                                <label for="product_id" class="label small px-1">Product ID</label>
                                                <input type="text" class="form-control" id="product_id<?php echo $cnt ?>"
                                                    name="product_id" value="<?php echo $result->product_id ?>"
                                                    placeholder="Product ID" required readonly>
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
                                                <label for="stock" class="label small px-1">Stock</label>
                                                <input type="number" class="form-control" id="stock<?php echo $cnt ?>"
                                                    name="stock" value="<?php echo $result->stock ?>" placeholder="Stock"
                                                    oninput="if (this.value < 0 || this.value.includes('.')) this.value = 0;" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price" class="label small px-1">Price</label>
                                                <input type="number" class="form-control" id="price<?php echo $cnt ?>"
                                                    name="price" value="<?php echo $result->price ?>" placeholder="Price"
                                                    oninput="if (this.value < 0) this.value = 0;" step="any" required>
                                            </div>
                                        </div>

                                        <div class="form-group pt-2 pb-2">
                                            <label for="category" class="label small px-1">Category</label>
                                            <input type="text" class="form-control" id="category<?php echo $cnt ?>"
                                                name="category" value="<?php echo $result->category ?>" placeholder="Category"
                                                required>
                                        </div>
                                        <hr>
                                        <div class="row form-group pt-2">
                                            <div class="col">
                                                <label for="date_ordered" class="label small px-1">Date Ordered</label>
                                                <input type="date" class="form-control" id="date_ordered<?php echo $cnt ?>" name="date_ordered"
                                                    placeholder="Date Ordered" value="<?php echo $result->date_ordered ?>" required>
                                            </div>

                                            <div class="col">
                                                <label for="date_arrival" class="label small px-1">Date of Arrival</label>
                                                <input type="date" class="form-control" id="date_arrival<?php echo $cnt ?>" name="date_arrival"
                                                    placeholder="Date Arrival" value="<?php echo $result->date_arrival ?>" required>
                                            </div>
                                        </div>
                                        
                                        <?php
                                        $suppliers = $sups->get_suppliers();
                                        ?>
                                        <div class="form-group pt-2">
                                            <label for="supplier_id" class="label small px-1">Supplier</label>
                                            <select class="form-control" id="supplier_id<?php echo $cnt ?>" name="supplier_id" required>
                                                <?php
                                                foreach ($suppliers as $supplier) {
                                                    $selected = ($supplier->supplier_id == $result->supplier_id) ? "selected" : "";
                                                    echo '<option value="' . $supplier->supplier_id . '" ' . $selected . '>' . $supplier->supplier_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="row form-group pt-2 pb-4">
                                            <div class="col">
                                                <label for="date_added" class="label small px-1">Date Added</label>
                                                <input type="date" class="form-control" id="date_added<?php echo $cnt ?>" name="date_added"
                                                    placeholder="Date Arrival" value="<?php echo $result->date_added ?>" required readonly>
                                            </div>
                                            <div class="col">
                                                <label for="added_by" class="label small px-1">Added By</label>
                                                <input type="added_by" class="form-control" id="added_by<?php echo $cnt ?>"
                                                    name="added_by" value="<?php echo $result->added_by ?>" required readonly>
                                            </div>
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

                    <button data-id="<?php echo $result->product_id ?>" type="button" name="delete" class="btn btn-danger btn-sm delete-btn delete"><i class='bx bx-trash' title="Delete Product"></i></button>
                </td>
            </tr>
    <?php
            $cnt++;
        }
    }
    ?>
</tbody>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>