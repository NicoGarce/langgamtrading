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
    
    // Generate random background color for each bar
    $colors[] = 'rgba('.rand(0, 255).', '.rand(0, 255).', '.rand(0, 255).', 0.6)';
}
?>

<div class="card rounded-4 p-2">
    <canvas id="inv-chart" height="350"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const inv = document.getElementById('inv-chart');

    new Chart(inv, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($product_names) ?>,
            datasets: [{
                label: 'Current Stock',
                data: <?php echo json_encode($stock_levels) ?>,
                backgroundColor: 'rgba(255, 0, 0, 0.6)', // Use the generated colors
                borderColor: 'rgba(255, 0, 0, 0.6)',
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
            maintainAspectRatio: false
        }
    });
</script>
