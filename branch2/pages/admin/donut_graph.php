<?php
$store = new Langgam();
$conn = $store->openConnection();

$salesCountStmt = $conn->prepare('SELECT COUNT(*) AS sales_count FROM branch2_sales');
$salesCountStmt->execute();
$salesCount = $salesCountStmt->fetchColumn();

$cancelledOrdersCountStmt = $conn->prepare('SELECT COUNT(*) AS cancelled_orders_count FROM branch2_orders WHERE order_status = :Cancelled');
$cancelledOrdersCountStmt->bindValue(':Cancelled', 'Cancelled', PDO::PARAM_STR); // Use bindValue
$cancelledOrdersCountStmt->execute();
$cancelledOrdersCount = $cancelledOrdersCountStmt->fetchColumn();

$returnedOrdersCountStmt = $conn->prepare('SELECT COUNT(*) AS returned_orders_count FROM branch2_orders WHERE order_status = :Returned');
$returnedOrdersCountStmt->bindValue(':Returned', 'Returned', PDO::PARAM_STR); // Use bindValue
$returnedOrdersCountStmt->execute();
$returnedOrdersCount = $returnedOrdersCountStmt->fetchColumn();

$refundedOrdersCountStmt = $conn->prepare('SELECT COUNT(*) AS refunded_orders_count FROM branch2_orders WHERE order_status = :Refunded');
$refundedOrdersCountStmt->bindValue(':Refunded', 'Refunded', PDO::PARAM_STR); // Use bindValue
$refundedOrdersCountStmt->execute();
$refundedOrdersCount = $refundedOrdersCountStmt->fetchColumn();
?>

<div class="card rounded-4 p-2">
    <canvas id="doughnut-chart" height="285"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const dtx = document.getElementById('doughnut-chart');

    new Chart(dtx, {
        type: 'doughnut',
        data: {
            labels: ['Sales', 'Cancelled Orders', 'Returned Orders', 'Refunded Orders'],
            datasets: [{
                data: [
                    <?php echo $salesCount; ?>,
                    <?php echo $cancelledOrdersCount; ?>,
                    <?php echo $returnedOrdersCount; ?>,
                    <?php echo $refundedOrdersCount; ?>
                ],
                backgroundColor: [
                    'rgba(242, 192, 87, 1)',
                    'rgba(209, 53, 37, 1)',
                    'rgba(51,169,83,255)',
                    'rgba(77, 133, 189, 1)'
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
