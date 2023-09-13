<div>
    
    <div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg pt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelNew">Create an Order</h5>
                    <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="registration-form">
                        <div class="form-group pt-2">
                            <input type="text" class="form-control" id="customer_name" name="customer_name"
                                placeholder="Customer Name" title="Customer Name" required>
                        </div>
                        <div class="form-group pt-2">
                            <input class="form-control" id="contact_info" name="contact_info" placeholder="Contact Information"
                                required title="Contact Information"></input>
                        </div>
                        <div class="form-group pt-2">
                            <select class="form-control" id="order_type" name="order_type" required title="Order Type">
                                <option value="" disabled selected>-Order Type-</option>
                                <option value="In-Store">In-Store</option>
                                <option value="Delivery">Delivery</option>
                            </select>
                        </div>
                        <hr>
                        <div class="container-fluid table-responsive">
                            <table class="table table-striped " id="orderTable">
                                <tr>
                                    <th class="text-center border" colspan="4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center flex-grow-1">
                                                <span class="text-uppercase">Order List</span>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-sm" id="addRowButton" 
                                                    title="Add Item"><i class='bx bx-plus'></i></button>
                                            </div>

                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="row gx-1 pb-4 px-3">
                            <div class="col-7">
                                <h6 for="pay_method" class="label small">Payment Method</h6>
                                <input type="text" class="form-control form-control-sm" id="pay_method" name="pay_method"
                                    placeholder="Enter Payment Method" title="Payment Method" required>
                            </div>
                            <div class="col ps-2">
                                <h6 for="total_cost" class="label small">Total Cost</h6>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">₱</span>
                                    <input type="text" class="form-control form-control-lg" id="total_cost" name="total_cost"
                                        placeholder="0.00" title="Total Cost" required readonly>
                                </div>
                                
                            </div>
                            <div class="col-7 pt-1">
                                <select class="form-control form-control-sm" id="pay_status" name="pay_status" required title="Payment Status">
                                    <option value="" disabled selected>- Payment Status -</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Partial">Partial</option>
                                </select>
                            </div>
                            <div class="col-5 ps-2 pt-1">
                                <select class="form-control form-control-sm" id="order_status" name="order_status" required title="Payment Status">
                                    <option value="" disabled selected>- Order Status -</option>
                                    <option value="In Fullfillment">In Fullfillment</option></option>
                                    <option value="Complete">Complete</option>
                                </select>
                            </div>
                            <input type="hidden" id="salesperson" name="salesperson" value="<?php $uid = $users->getID();
                                $first_name = $uid[0]->firstName;
                                $last_name = $uid[0]->lastName;
                                echo $first_name . ' ' . $last_name; 
                            ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="footClose" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="create_order" name="create_order" class="btn btn-primary">Create Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer src ="modals/create_order.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
