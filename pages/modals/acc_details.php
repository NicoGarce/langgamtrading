<tbody>
    <?php
    $results = $store->get_users();

    $cnt = 1;
    if (count($results) > 0) {
        foreach ($results as $result) {
            ?>
            <tr>
                
                <td class="text-center">
                    <?php echo htmlentities($result->ID); ?>
                </td>
                <td>
                    <?php echo htmlentities($result->firstName); ?>
                </td>
                <td>
                    <?php echo htmlentities($result->lastName); ?>
                </td>
                <td>
                    <?php echo htmlentities($result->role); ?>
                </td>
                <td>
                    <?php echo htmlentities($result->date_added); ?>
                </td>
                <td>
                    
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editAccount<?php echo $cnt ?>">
                        <i class='bx bx-info-circle'></i></button>

                    
                    <div class="modal fade pt-5" id="editAccount<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog pt-5">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="labelEdit">Account Details</h5>
                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="registration-form<?php echo $cnt ?>">
                                        <input name="ID" value="<?php echo $result->ID ?>" type="hidden">
                                        <div class="form-group">
                                            
                                                <img src="<?php echo $result->photo?>" class="img-fluid">
                                            
                                        </div>
                                        <div class="form-group">
                                            <span>Account ID:
                                                <?php echo $result->ID; ?>
                                            </span>
                                        </div>
                                        <div class="form-group pt-2">
                                            <span>Name:
                                                <?php echo $result->firstName ?>
                                                <?php echo $result->lastName ?>
                                            </span>
                                        </div>

                                        <div class="form-group pt-2">
                                            <span>Username:
                                                <?php echo $result->username ?>
                                            </span>
                                        </div>

                                        <div class="form-group pt-2">
                                            <span>Mobile:
                                                <?php echo $result->mobile ?>
                                            </span>
                                        </div>

                                        <div class="form-group pt-2">
                                            <span>Email:
                                                <?php echo $result->email ?>
                                            </span>
                                        </div>

                                        <div class="form-group pt-2">
                                            <span>Address:
                                                <?php echo $result->address ?>
                                            </span>
                                        </div>

                                        <div class="form-group pt-2">
                                            <span>Role:
                                                <?php echo $result->role ?>
                                            </span>
                                        </div>

                                        <div class="form-group pt-2 pb-3">
                                            <span>Date Added:
                                                <?php echo $result->date_added ?>
                                            </span>
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
                    <button data-id="<?php echo $result->ID ?>" type="button" name="delete"
                        class="btn btn-danger btn-sm delete-btn"><i class='bx bx-trash'></i></button>
                </td>
            </tr>
            <?php
            $cnt++;
        }
    } else {
        echo '<tr><td colspan="9">No users found</td></tr>';
    }
    ?>
</tbody>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>