<?php
class Suppliers {
    public function get_suppliers()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_suppliers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_supplier()
    {
        $store = new Langgam();
        $users = new Users();
        
        if (isset($_POST['add_supplier'])) {
            $supplier_name = $_POST["supplier_name"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];

            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $added_by = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();

            $sql = "INSERT INTO branch2_suppliers SET supplier_name = :supplier_name, description = :description, address = :address, contact = :contact";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'supplier_name' => $supplier_name,
                'description' => $description,
                'address' => $address,
                'contact' => $contact
            ]);

            if ($stmt->rowCount() !== false) {
                $record_id = $pdo->lastInsertId();
                
                date_default_timezone_set('Asia/Manila');

                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $add = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($add);
                $stmt->execute([
                    'action_type'=> "Added a Supplier",
                    'user_id' => $uid,
                    'username' => $username,
                    'full_name' => $added_by,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name'=> "Suppliers",
                    'record_id' => $record_id
                ]);

                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Supplier added successfully',
                showConfirmButton: false,
                timer: 2000,
                showClass: {
                    popup: 'swal2-show'
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to add supplier',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
            </script>";
            }
        }
    }
    public function edit_supplier()
    {
        $store = new Langgam();
        $users = new Users();

        if (isset($_POST['update'])) {
            $supplier_id = $_POST['supplier_id'] ?? '';
            $supplier_name = $_POST["supplier_name"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];

            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $added_by = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();

            $sql = "UPDATE branch2_suppliers SET supplier_name = :supplier_name, description = :description, address = :address, contact = :contact WHERE supplier_id = :supplier_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'supplier_id' => $supplier_id,
                'supplier_name' => $supplier_name,
                'description' => $description,
                'address' => $address,
                'contact' => $contact,

            ]);

            if ($stmt->rowCount() !== false) {
                
                date_default_timezone_set('Asia/Manila');
                
                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $edit = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Edited a Supplier",
                    'user_id' => $uid,
                    'username' => $username,
                    'full_name' =>$added_by,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Suppliers',
                    'record_id' => $supplier_id
                ]);

                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Supplier edited successfully',
                showConfirmButton: false,
                timer: 2000,
                showClass: {
                    popup: 'swal2-show'
                }
            }).then(function() {
                window.location.href = window.location.href;
            });
        </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to edit supplier',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
            </script>";
            }
        }
    }
    public function delete_supp()
    {
        $store = new Langgam();
        $users = new Users();

        if (isset($_REQUEST['delete'])) {
            $supplier_id = $_GET['supplier_id'] ?? '';
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $added_by = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch2_suppliers where supplier_id =:supplier_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':supplier_id' => $supplier_id]);

            if ($stmt->rowCount() !== false) {
                
                date_default_timezone_set('Asia/Manila');

                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $edit = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Deleted a Supplier",
                    'user_id' => $uid,
                    'username' => $username,
                    'full_name' =>$added_by,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Suppliers',
                    'record_id' => $supplier_id
                ]);
            }

        }
    }
}
$sups = new Suppliers();

