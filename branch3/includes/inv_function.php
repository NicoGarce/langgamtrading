<?php
require_once('users_function.php');
require_once('sups_function.php');
class Inventory{
    public function get_inventory()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_inventory");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_product()
    {
        $store = new Langgam();
        $users = new Users();
        if (isset($_POST['add_product'])) {
            $product_name = $_POST["product_name"];
            $stock = $_POST["stock"];
            $price = $_POST["price"];
            $category = $_POST["category"];
            $date_ordered = $_POST['date_ordered'];
            $date_arrival = $_POST['date_arrival'];
            $supplier_id = $_POST['supplier_id'];

            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;

            $added_by = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();

            $supplier_name = "";
            $stmt = $pdo->prepare("SELECT supplier_name FROM branch3_suppliers WHERE supplier_id = :supplier_id");
            $stmt->execute(['supplier_id' => $supplier_id]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if ($result) {
                $supplier_name = $result->supplier_name;
            }

            $sql = "INSERT INTO branch3_inventory 
                    SET product_name = :product_name, 
                    stock = :stock, 
                    price = :price, 
                    category = :category, 
                    date_ordered = :date_ordered, 
                    date_arrival= :date_arrival,
                    added_by = :added_by,
                    user_id = :user_id,
                    supplier_id =:supplier_id,
                    supplier_name =:supplier_name";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'product_name' => $product_name,
                'stock' => $stock,
                'price' => $price,
                'category' => $category,
                'date_ordered' => $date_ordered,
                'date_arrival' => $date_arrival,
                'added_by' => $added_by,
                'user_id' => $uid,
                'supplier_id' => $supplier_id,
                'supplier_name' => $supplier_name

            ]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product added successfully',
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
                    text: 'Unable to add product',
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
    public function edit_product()
    {
        $store = new Langgam();
        if (isset($_POST['update'])) {
            $product_id = $_POST["product_id"] ?? '';
            $product_name = $_POST["product_name"];
            $stock = $_POST["stock"];
            $price = $_POST["price"];
            $category = $_POST["category"];
            $date_ordered = $_POST['date_ordered'];
            $date_arrival = $_POST['date_arrival'];
            $supplier_id = $_POST['supplier_id'];

            $ID = $store->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;

            $added_by = $first_name . ' ' . $last_name;


            $pdo = $store->openConnection();

            $supplier_name = "";
            $stmt = $pdo->prepare("SELECT supplier_name FROM branch3_suppliers WHERE supplier_id = :supplier_id");
            $stmt->execute(['supplier_id' => $supplier_id]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if ($result) {
                $supplier_name = $result->supplier_name;
            }

            $sql = "UPDATE branch3_inventory 
                    SET product_name = :product_name, 
                    stock = :stock, 
                    price = :price, 
                    category = :category, 
                    date_ordered = :date_ordered, 
                    date_arrival = :date_arrival,
                    supplier_id =:supplier_id,
                    supplier_name =:supplier_name
                    WHERE product_id = :product_id";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'product_id' => $product_id,
                'product_name' => $product_name,
                'stock' => $stock,
                'price' => $price,
                'category' => $category,
                'date_ordered' => $date_ordered,
                'date_arrival' => $date_arrival,
                'supplier_id' => $supplier_id,
                'supplier_name' => $supplier_name

            ]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product edited successfully',
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
                    text: 'Unable to edit product',
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
    public function delete_product()
    {
        $store = new Langgam();
        if (isset($_REQUEST['delete'])) {
            $product_id = $_GET['product_id'] ?? '';

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch3_inventory where product_id =:product_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':product_id' => $product_id]);

            if ($stmt->rowCount() !== false) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product removed successfully',
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
                    text: 'Unable to remove product',
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
$inventory = new Inventory();
