<tbody>
    <?php
    $results = $users->get_users();

    $cnt = 1;
    if (count($results) > 0) {
        foreach ($results as $result) {
            ?>
            <tr>
                
                <td class="text-center">
                    <?php echo htmlentities($result->ID); ?>
                </td>
                <td class="text-center d-none d-sm-table-cell">
                    <img src="<?php echo (!empty($result->photo)) ? '../../' . $result->photo : '../../../assets/user_upload/default.png' ?>" 
                        alt="photo" class="img-fluid border border-2 rounded-circle" width="60px" height="60px">
                </td>
                <td>
                    <?php echo htmlentities($result->firstName); ?> <?php echo htmlentities($result->lastName); ?>
                </td>
                
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->username); ?>
                </td>
                
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->role); ?>
                </td>
                <td class="d-none d-sm-table-cell">
                    <?php echo htmlentities($result->date_added); ?>
                </td>
                <td>
                    
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#accDetails<?php echo $cnt ?>" title="Account Details (<?php echo $result->firstName ?>)">
                        <i class='bx bx-info-circle'></i></button>

                    
                        <div class="modal fade" id="accDetails<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label"
                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="labelEdit">Account Details</h5>
                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="registration-form<?php echo $cnt ?>">
                                        <input name="ID" value="<?php echo $result->ID ?>" type="hidden">
                                        <div class="form-group d-flex justify-content-center">
                                            <img src="<?php echo (!empty($result->photo)) ? '../../' . $result->photo : '../../../assets/user_upload/default.png' ?>" class="img-fluid rounded-circle border border-2" width="200px">
                                        </div>

                                        
                                        <div class="row pt-2">
                                            <div class="form-group col-md-5">
                                                <label for="uid" class="label small px-1">Account ID</label>
                                                <input type="text" class="form-control" id="uid<?php echo $cnt ?>"
                                                    name="uid" value="<?php echo $result->ID; ?>" required readonly disabled>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="name" class="label small px-1">Name</label>
                                                <input type="text" class="form-control" id="name<?php echo $cnt ?>"
                                                    name="name" value="<?php echo $result->firstName ?> <?php echo $result->lastName ?>" required readonly disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="row pt-2">
                                            <div class="form-group col-md-5">
                                                <label for="username" class="label small px-1">Username</label>
                                                <input type="username" class="form-control" id="username<?php echo $cnt ?>"
                                                    name="username" value="<?php echo $result->username ?>" required readonly disabled>
                                            </div>

                                            <div class="form-group col-md-7">
                                                <label for="mobile" class="label small px-1">Mobile</label>
                                                <input type="text" class="form-control" id="mobile<?php echo $cnt ?>"
                                                    name="mobile" value="<?php echo $result->mobile ?>" required readonly disabled>
                                            </div>
                                        </div>

                                        <div class="form-group pt-2">
                                                <label for="email" class="label small px-1">Email</label>
                                                <input type="text" class="form-control" id="email<?php echo $cnt ?>"
                                                    name="email" value="<?php echo $result->email ?>" required readonly disabled>
                                            </div>

                                        <div class="form-group pt-2">
                                            <label for="address" class="label small px-1">Address</label>
                                            <textarea type="text" class="form-control" id="address<?php echo $cnt ?>" name="address" value="<?php echo $result->address ?>" required readonly disabled><?php echo $result->address ?></textarea>
                                        </div>
                                        
                                        <div class="row pt-2 pb-3">
                                            <div class="form-group col">
                                                <label for="role" class="label small px-1">Role</label>
                                                <input type="text" class="form-control" id="role<?php echo $cnt ?>"
                                                name="role" value="<?php echo $result->role ?>" required readonly disabled>
                                            </div>

                                            <div class="form-group col">
                                                <label for="date_added" class="label small px-1">Date Added</label>
                                                <input type="text" class="form-control" id="date_added<?php echo $cnt ?>"
                                                name="date_added" value="<?php echo $result->date_added ?>" required readonly disabled>
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
                    <button data-id="<?php echo $result->ID ?>" type="button" name="delete"
                        class="btn btn-danger btn-sm delete-btn delete"><i class='bx bx-trash' title="Delete <?php echo $result->firstName ?>"></i></button>
                </td>
            </tr>
            <?php
            $cnt++;
        }
    } 
    ?>
</tbody>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>