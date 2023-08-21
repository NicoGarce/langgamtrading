<?php
class Suppliers {
    public function get_suppliers()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_suppliers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_supplier()
    {
        $store = new Langgam();

        if (isset($_POST['add_supplier'])) {
            $supplier_name = $_POST["supplier_name"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];

            $pdo = $store->openConnection();

            $sql = "INSERT INTO branch1_suppliers SET supplier_name = :supplier_name, description = :description, address = :address, contact = :contact";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'supplier_name' => $supplier_name,
                'description' => $description,
                'address' => $address,
                'contact' => $contact
            ]);

            if ($stmt->rowCount() !== false) {
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

        if (isset($_POST['update'])) {
            $supplier_id = $_POST['supplier_id'] ?? '';
            $supplier_name = $_POST["supplier_name"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];


            $pdo = $store->openConnection();

            $sql = "UPDATE branch1_suppliers SET supplier_name = :supplier_name, description = :description, address = :address, contact = :contact WHERE supplier_id = :supplier_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'supplier_id' => $supplier_id,
                'supplier_name' => $supplier_name,
                'description' => $description,
                'address' => $address,
                'contact' => $contact,

            ]);

            if ($stmt->rowCount() !== false) {
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

        if (isset($_REQUEST['delete'])) {
            $supplier_id = $_GET['supplier_id'] ?? '';

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch1_suppliers where supplier_id =:supplier_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':supplier_id' => $supplier_id]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Supplier removed successfully',
                confirmButtonColor: '#3085d6',
                customClass: {
                    confirmButton: '#3085d6',
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
                    text: 'Unable to remove supplier',
                    confirmButtonColor: '#3085d6',
                    customClass: {
                        confirmButton: '#3085d6',
                    }
                });
            </script>";
            }

        }
    }
}
$sups = new Suppliers();

