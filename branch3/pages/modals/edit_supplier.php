<tbody>
    <?php
    $results = $store->get_suppliers();

    $cnt = 1;
    if (count($results) > 0) {
        foreach ($results as $result) {
            ?>
            <tr>

                <td class="text-center">
                    <?php echo htmlentities($cnt); ?>
                </td>
                <td>
                    <?php echo htmlentities($result->supplier_name); ?>
                </td>
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->description); ?>
                </td>
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->address); ?>
                </td>
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->contact); ?>
                </td>
                
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editSupplier<?php echo $cnt ?>" title="Edit <?php echo $result->supplier_name ?>">
                        <i class='bx bx-edit'></i></button>

                    <div class="modal fade" id="editSupplier<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog pt-5">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="labelEdit">Edit Supplier</h5>
                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="registration-form<?php echo $cnt ?>">
                                        <input name="ID" value="<?php echo $result->supplier_id ?>" type="hidden">
                                        <div class="form-group row justify-content-center">
                                            <div class="form-group col-sm-5">
                                                <label for="supplier_id" class="label small px-1">Supplier ID</label>
                                                <input type="text" class="form-control" id="supplier_id<?php echo $cnt ?>"
                                                    name="supplier_id" value="<?php echo $result->supplier_id ?>"
                                                    placeholder="Supplier ID" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group pt-2">
                                            <div class="form-group">
                                                <label for="supplier_name" class="label small px-1">Supplier Name</label>
                                                <input type="text" class="form-control" id="supplier_name<?php echo $cnt ?>"
                                                    name="supplier_name" value="<?php echo $result->supplier_name ?>"
                                                    placeholder="Supplier Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label for="description" class="label small px-1">Description</label>
                                            <textarea class="form-control" id="description<?php echo $cnt ?>" name="description"
                                                placeholder="Description" required><?php echo $result->description ?></textarea>
                                        </div>
                                        <div class="form-group pt-2 ">
                                            <label for="address" class="label small px-1">Address</label>
                                            <textarea class="form-control" id="address<?php echo $cnt ?>" name="address"
                                                placeholder="Address" required><?php echo $result->address ?></textarea>
                                        </div>
                                        <div class="form-group pt-2 pb-4">
                                            <label for="contact" class="label small px-1">Contact</label>
                                            <input type="text" class="form-control" id="contact<?php echo $cnt ?>"
                                                name="contact" value="<?php echo $result->contact ?>" placeholder="Contact"
                                                required>
                                            <span id="mobile-message<?php echo $cnt ?>"></span>
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
                    <button data-id="<?php echo $result->supplier_id ?>" type="button" name="delete"
                        class="btn btn-danger btn-sm delete-btn"><i class='bx bx-trash' title="Delete <?php echo $result->supplier_name ?>"></i></button>
                    
                </td>

            </tr>
            <?php
                
                $cnt++;
                
        }
    } 
    ?>

</tbody>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
