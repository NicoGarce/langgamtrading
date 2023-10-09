<tbody>
    <?php
    $results = $orders->get_voided();

    $cnt = 1;
    if (count($results) > 0) {
        foreach ($results as $result) {
    ?>
            <tr>
                <td class="text-center">
                    <?php echo htmlentities($result->order_id); ?>
                </td>

                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->order_date); ?>
                </td>
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->order_time); ?>
                </td>
                <td class="d-none d-sm-table-cell text-center">
                    <?php echo htmlentities($result->order_status); ?>
                </td>
                <td class="text-center d-none d-sm-table-cell">
                    <?php echo htmlentities($result->pay_method); ?>
                </td>

                <td class="d-none d-sm-table-cell">
                    ₱
                    <?php echo htmlentities($result->total_cost); ?>
                </td>

                <td style="width: 50px;">

                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#voided<?php echo $cnt ?>" title="Edit Order">
                    <i class='bx bx-info-circle'></i></button>

                    <div class="modal fade" id="voided<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="labelEdit">Order <?php echo $result->order_id ?> | Details (<?php echo $result->order_status ?>)</h5>
                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="edit-reg-form<?php echo $result->order_id ?>">

                                        <input id ="ID" name="ID" value="<?php echo $result->order_id ?>" type="hidden">

                                        <div class="form-group pt-2">
                                            <label for="customer_name" class="label small">Customer Name</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" 
                                            value="<?php echo $result->customer_name ?>" title="Customer Name" required readonly>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label for="contact_info" class="label small">Contact Information</label>
                                            <input class="form-control" id="contact_info" name="contact_info" placeholder="Contact Information"
                                            value="<?php echo $result->contact_info ?>" required title="Contact Information" readonly></input>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label for="order_type" class="label small">Order Type</label>
                                            <input class="form-control" id="order_type" name="order_type" placeholder="Order Type"
                                            value="<?php echo $result->order_type ?>" required title="Order Type" readonly></input>
                                        </div>

                                        <div class="form-group pt-2">
                                            <label for="shipping_details" class="label small">Shipping Details</label>
                                            <textarea class="form-control" id="shipping_details" name="shipping_details" placeholder="Shipping Details" 
                                            title="Shipping Details" readonly><?php echo $result->shipping_details ?></textarea>
                                        </div>
                                        
                                        <div class="form-group pt-2">
                                            <label for="salesperson" class="label small">Salesperson</label>
                                            <input class="form-control" id="salesperson" name="salesperson" placeholder="Salesperson"
                                            value="<?php echo $result->salesperson ?>" required title="Salesperson" readonly></input>
                                        </div>


                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="orderTable<?php echo $order_id ?>">
                                                <tr>
                                                    <th class="text-center" colspan="3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="text-center flex-grow-1">
                                                                <span class="text-uppercase">Order List</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">
                                                        Product Name
                                                    </th>
                                                    <th class="text-center">
                                                        Qty
                                                    </th>
                                                    <th class="text-center">
                                                        Price
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <?php 
                                                    $order_id = $result->order_id;
                                                    $list = json_decode($result->order_list);
                                                    foreach ($list as $orderItem) {
                                                        ?>
                                                        <td class="text-center"><?php echo $orderItem->product_name; ?></td>
                                                        <td class="text-center"><?php echo $orderItem->quantity; ?></td>
                                                        <td class="text-center">₱ <?php echo $orderItem->price; ?></td>
                                                        </tr><tr> <!-- Add a new row for the next product -->
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>


                                            </table>
                                        </div>

                                        <hr>
                                        <div class="row gx-1 pt-2 pb-2 px-3">
                                            <div class="col-12 col-sm-12 col-lg-6">
                                                <label for="pay_method" class="label small">Payment Method</label>
                                                <input type="text" class="form-control form-control-lg" id="pay_method" name="pay_method" placeholder="Enter Payment Method" 
                                                    value="<?php echo $result->pay_method ?>" title="Payment Method" required readonly>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-6">
                                                <label for="total_cost" class="label small">Total Cost</label>
                                                <input type="text" class="form-control form-control-lg" id="total_cost" name="total_cost" 
                                                placeholder="0.00" value="₱ <?php echo $result->total_cost ?>" title="Total Cost" required readonly>
                                            </div>
                                        </div>

                                        <div class="row gx-1 pt-1 pb-4 px-3">
                                            <div class="col-12 col-sm-6 col-lg-6">
                                                <label for="pay_status" class="label small">Payment Status</label>
                                                <input type="text" class="form-control" id="payment_status" name="payment_status"
                                                 value="<?php echo $result->payment_status ?>" title="Payment Status" required readonly>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-6">
                                                <label for="order_status" class="label small">Order Status</label>
                                                <input type="text" class="form-control" id="order_status" name="order_status"
                                                 value="<?php echo $result->order_status ?>" title="Order Status" required readonly>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" id="invoice<?php echo $result->order_id ?>" onclick="generatePDF(<?php echo $result->order_id  ?>)" 
                                                title="Print Invoice" class="btn btn-dark"><i class='bx bxs-printer'></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button data-id="<?php echo $result->order_id ?>" type="button" name="delete" class="btn btn-danger btn-sm delete-btn delete"><i class='bx bx-trash' title="Delete Order"></i></button>
                </td>
            </tr>
            
    <?php
            $cnt++;
        }
    }
    ?>
</tbody>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function generatePDF(order_id) {
    $.ajax({
        type: "POST",
        url: "/langgamtrading/branch1/includes/generatePDF.php",
        data: { order_id: order_id },
        success: function(data) {
            window.open('/langgamtrading/branch1/includes/generatePDF.php?order_id=' + order_id, '_blank');
        },
        error: function(xhr, status, error) {
            alert('An error occurred while generating the PDF: ' + error);
        }
    });
}
</script>

