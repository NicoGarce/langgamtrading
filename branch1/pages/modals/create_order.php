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
                        <div class="form-group pt-2 text-center"> <!-- Added text-center class to center the content -->
                            <input type="text" class="form-control w-50 mx-auto" id="order_id" name="order_id"
                                placeholder="Order ID" title="Order ID" required>
                            <!-- Added w-50 and mx-auto classes to adjust width and center the input -->
                        </div>
                        <div class="form-group pt-2">
                            <input type="text" class="form-control" id="customer_name" name="customer_name"
                                placeholder="Customer Name" title="Customer Name" required>
                        </div>
                        <div class="form-group pt-2">
                            <textarea class="form-control" id="cust_address" name="cust_address" placeholder="Address"
                                required title="Customer Address"></textarea>
                        </div>
                        <hr>
                        <div class="container-fluid table-responsive">
                            <table class="table table-striped " id="orderTable">
                                <tr>
                                    <th class="text-center border" colspan="4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center flex-grow-1">
                                                <span>Order List</span>
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
                            <div class="col">
                                <h6 for="MOP" class="label small">Mode of Payment</h6>
                                <input type="text" class="form-control form-control-sm" id="MOP" name="MOP"
                                    placeholder="Mode of Payment" title="Mode of Payment" required>
                            </div>
                            <div class="col">
                                <h6 for="totalCost" class="label small">Total Cost</h6>
                                <input type="text" class="form-control form-control-sm" id="totalCost" name="totalCost"
                                    placeholder="0.00" title="Total Cost" required readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="footClose" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_product" class="btn btn-primary">Create Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
