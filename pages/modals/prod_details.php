<tbody>
    <?php
    $results = $store->get_inventory();

    $cnt = 1;
    if (count($results) > 0) {
        foreach ($results as $result) {
            ?>
            <tr>
                <td>
                    <?php echo htmlentities($result->product_name); ?>
                </td>
                
                <td class="text-center d-none d-sm-table-cell">
                    <?php echo htmlentities($result->quantity); ?>
                </td>
                
                <td class="d-none d-sm-table-cell">
                    ₱<?php echo htmlentities($result->price); ?>
                </td>
                
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->category); ?>
                </td>

                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->date_ordered); ?>
                </td>

                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->date_arrival); ?>
                </td>

                <td>
                    
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                        data-bs-target="#accDetails<?php echo $cnt ?>" title="Product Details">
                        <i class='bx bx-info-circle'></i></button>

                    
                    <div class="modal fade" id="accDetails<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog pt-5">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="labelEdit">Product Details</h5>
                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="registration-form<?php echo $cnt ?>">
                                        <input name="ID" value="<?php echo $result->product_id ?>" type="hidden">
   
                                        <div class="form-group">
                                            <span>Product ID:
                                                <?php echo $result->product_id; ?>
                                            </span>
                                        </div>
                                        <div class="form-group pt-3">
                                            <span>Product Name: <?php echo $result->product_name ?> </span>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="form-group pt-2 col-md-6">
                                                <span>Quantity: <?php echo $result->quantity ?> </span>
                                            </div>

                                            <div class="form-group pt-2 col-md-6">
                                                <span>Price: ₱ <?php echo $result->price ?> </span>
                                            </div>
                                        </div>
                                        
                                        <div class="row pt-2">
                                            <div class="form-group pt-2 col-md-6">
                                                <span>Category: <?php echo $result->category ?></span>
                                            </div>
                                            <div class="form-group pt-2 col-md-6">
                                                <span>Date Added: <?php echo $result->date_added ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row pt-2">
                                            <div class="form-group pt-2 col-md-6">
                                                <span>Date Ordered: <?php echo $result->date_ordered ?></span>
                                            </div>
                                            <div class="form-group pt-2 col-md-6">
                                                <span>Date of Arrival: <?php echo $result->date_arrival ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row pt-2 pb-4">
                                            <div class="form-group pt-2 col-md-6">
                                                <span>  Added By: <br> 
                                                        &nbsp; User ID: <?php echo $result->user_id ?> <br>
                                                        &nbsp; Name: <?php echo $result->added_by ?>  
                                                        
                                                </span>
                                            </div>

                                            <div class="form-group pt-2 pb-4 col-md-6">
                                                <span>  Supplier: <br> 
                                                        &nbsp; Supplier ID: <?php echo $result->supplier_id ?> <br>
                                                        &nbsp; Supplier Name: <?php echo $result->supplier_name ?>  
                                                        
                                                </span>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="modal-footer">
                                            <button type="button" id="footClose<?php echo $cnt ?>" class="btn btn-dark"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include('modals/edit_product.php') ?>

                    <button data-id="<?php echo $result->product_id ?>" type="button" name="delete"
                        class="btn btn-danger btn-sm delete-btn delete"><i class='bx bx-trash' title="Delete Product"></i></button>
                </td>
            </tr>
            <?php
            $cnt++;
        }
    } 
    ?>
</tbody>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>