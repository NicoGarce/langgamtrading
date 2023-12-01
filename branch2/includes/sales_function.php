<?php
require_once('users_function.php');
class Sales{
    public function get_sales()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_sales;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);


        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->order_id = $result->order_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        return $orderItems;
    }

    public function get_sale_by_id($sale_id)
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_sales WHERE sale_id = :sale_id");
        $stmt->bindParam(':sale_id', $sale_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);

        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->sale_id = $result->sale_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        return $orderItems;
    }

    public function importSale()
    {
        $users = new Users();
        if (isset($_POST["import"])) {
            $fileName = $_FILES["excel"]["name"];
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));

            $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

            $targetDirectory = "../../../assets/excelUploads/" . $newFileName;
            move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

            require "../../../assets/excelReader/excel_reader2.php";
            require "../../../assets/excelReader/SpreadsheetReader.php";

            $reader = new SpreadsheetReader($targetDirectory);

            $expectedColumns = 15;

            // Initialize a flag or counter to skip the first row
            $skipFirstRow = true;

            foreach ($reader as $key => $row) {
                // Check if it's the first row and skip it
                if ($skipFirstRow) {
                    $skipFirstRow = false;
                    continue;
                }

                if (count($row) != $expectedColumns) {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Please upload the excel file with the correct format.',
                            showConfirmButton: false,
                            timer: 5000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        });
                        </script>";
                    return; // Stop processing further if validation fails
                }
                
                $customer_name = $row[0];
                $order_date = $row[1];
                $order_time = $row[2];
                $order_list = $row[3];
                $total_cost = $row[4];
                $pay_method = $row[5];
                $order_status = $row[6];
                $payment_status = $row[7];
                $contact_info = $row[8];
                $order_type = $row[9];
                $user_id = $row[10];
                $salesperson = $row[11];
                $shipping_details = $row[12];
                $date_complete = $row[13];
                $time_complete = $row[14];

                $insertQuery = "INSERT INTO branch2_sales (customer_name, order_date, order_time, order_list, total_cost, pay_method, order_status, payment_status, contact_info, order_type, user_id, salesperson, shipping_details, date_complete, time_complete) 
                VALUES (:customer_name, :order_date, :order_time, :order_list, :total_cost, :pay_method, :order_status, :payment_status, :contact_info, :order_type, :user_id, :salesperson, :shipping_details, :date_complete, :time_complete)";
                $store = new Langgam();
                $pdo = $store->openConnection();
                // Prepare the statement
                $stmt = $pdo->prepare($insertQuery);

                // Bind parameters
                $stmt->bindParam(':customer_name', $customer_name);
                $stmt->bindParam(':order_date', $order_date);
                $stmt->bindParam(':order_time', $order_time);
                $stmt->bindParam(':order_list', $order_list);
                $stmt->bindParam(':total_cost', $total_cost);
                $stmt->bindParam(':pay_method', $pay_method);
                $stmt->bindParam(':order_status', $order_status);
                $stmt->bindParam(':payment_status', $payment_status);
                $stmt->bindParam(':contact_info', $contact_info);
                $stmt->bindParam(':order_type', $order_type);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':salesperson', $salesperson);
                $stmt->bindParam(':shipping_details', $shipping_details);
                $stmt->bindParam(':date_complete', $date_complete);
                $stmt->bindParam(':time_complete', $time_complete);

                // Execute the query
                $stmt->execute();

                if ($stmt->rowCount() !== false) {
                    $ID = $users->getID();
                    $first_name = $ID[0]->firstName;
                    $last_name = $ID[0]->lastName;
                    $uid = $ID[0]->ID;
                    $username = $ID[0]->username;
                    $role = $ID[0]->role;

                    $added_by = $first_name.' '.$last_name;
                    $record_id = $pdo->lastInsertId();
                
                    date_default_timezone_set('Asia/Manila');

                    $time = date('H:i:s');   
                    $date = date('Y-m-d');

                    $add = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                            VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                    $stmt = $pdo->prepare($add);
                    $stmt->execute([
                        'action_type'=> "Imported Sales",
                        'user_id' => $uid,
                        'username' => $username,
                        'full_name' => $added_by,
                        'role' => $role,
                        'time' => $time,
                        'date' => $date,
                        'table_name'=> "Sales",
                        'record_id' => $record_id
                    ]);

                    echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Import Successful',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
                </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to import file',
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
    }

    public function getTop10MostBoughtItems()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_sales WHERE order_status NOT IN ('Cancelled', 'Returned', 'Refunded')");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->sale_id = $result->sale_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        // Calculate item counts based on quantity
        $itemCounts = [];

        foreach ($orderItems as $orderItem) {
            $productName = $orderItem->product_name;
            $quantity = $orderItem->quantity;

            if (!isset($itemCounts[$productName])) {
                $itemCounts[$productName] = 0;
            }

            $itemCounts[$productName] += $quantity;
        }

        // Sort the items by total quantity in descending order
        arsort($itemCounts);

        // Get the top 10 most bought items
        $top10Items = array_slice($itemCounts, 0, 10, true);

        return $top10Items;
    }


    public function getTop10Month()
    {
        // Set the timezone to Asia/Manila
        date_default_timezone_set('Asia/Manila');

        // Get the first day of the current month
        $currentMonthStart = date('Y-m-01 00:00:00');

        $store = new Langgam();
        $conn = $store->openConnection();

        // Modify the SQL query to filter by the current month and exclude certain order statuses
        $sql = "SELECT * FROM branch2_sales 
            WHERE order_status NOT IN ('Cancelled', 'Returned', 'Refunded') 
            AND date_complete >= :currentMonthStart";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':currentMonthStart', $currentMonthStart, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->sale_id = $result->sale_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        // Calculate item counts based on quantity
        $itemCounts = [];

        foreach ($orderItems as $orderItem) {
            $productName = $orderItem->product_name;
            $quantity = $orderItem->quantity;

            if (!isset($itemCounts[$productName])) {
                $itemCounts[$productName] = 0;
            }

            $itemCounts[$productName] += $quantity;
        }

        // Sort the items by count in descending order
        arsort($itemCounts);

        // Get the top 10 most bought items
        $top10Items = array_slice($itemCounts, 0, 10, true);

        return $top10Items;
    }

    public function delete_sale()
    {
        $store = new Langgam();
        $users = new Users;

        if (isset($_REQUEST['delete'])) {
            $sale_id = $_GET['sale_id'] ?? '';
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $user_id = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $fullname = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch2_sales where sale_id =:sale_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':sale_id' => $sale_id]);
            
            if ($stmt->rowCount() !== false) {
                date_default_timezone_set('Asia/Manila');

                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $edit = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Removed a Sale",
                    'user_id' => $user_id,
                    'username' => $username,
                    'full_name' =>$fullname,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Sales',
                    'record_id' => $sale_id
                ]);
            }
        }
    }

}
$sales = new Sales();

?>