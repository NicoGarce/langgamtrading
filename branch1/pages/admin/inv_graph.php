<?php
$store = new Langgam();
$conn = $store->openConnection();

$stmt = $conn->prepare('SELECT
    product_name,
    stock
    FROM
    branch1_inventory
    ORDER BY
    product_name;');
$stmt->execute();

$product_names = []; // To store product names
$stock_levels = [];  // To store current stock levels
$colors = []; // To store background colors for each bar

foreach ($stmt as $data) {
    $product_names[] = $data['product_name'];
    $stock_levels[] = $data['stock'];

    // Determine the background color based on stock level
    if ($data['stock'] > 15) {
        $colors[] = 'rgba(77, 133, 189, 1)'; // Green
    } elseif ($data['stock'] === 15) {
        $colors[] = 'rgba(252, 188, 5, 255)'; // Yellow
    } else {
        $colors[] = 'rgba(234, 66, 53, 255)'; // Red
    }
}
?>

<div class="card rounded-4 p-2">
    <canvas id="inv-chart" height="285"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const inv = document.getElementById('inv-chart');

    new Chart(inv, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($product_names) ?>,
            datasets: [{
                label: 'Current Stock Levels',
                data: <?php echo json_encode($stock_levels) ?>,
                backgroundColor: <?php echo json_encode($colors) ?>, // Use the generated colors
                borderColor: <?php echo json_encode($colors) ?>, // Set border color the same as background color
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Stock Level'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Product Name'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        boxWidth: 0
                    }
                }
            }
        }
    });
</script>
