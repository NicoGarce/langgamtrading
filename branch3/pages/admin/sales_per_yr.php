<?php

$store = new Langgam();
$conn = $store->openConnection();

$stmt = $conn->prepare('SELECT
    EXTRACT(MONTH FROM date_complete) AS order_month,
    EXTRACT(YEAR FROM date_complete) AS order_year,
    SUM(total_cost) AS total_sales
    FROM
        branch3_sales
    GROUP BY
        order_year
    ORDER BY
        order_year;');
$stmt->execute();

$year = [];      // To store only the year
$total = [];     // To store total sales

foreach ($stmt as $data) {
    $year[] = $data['order_year'];
    $total[] = $data['total_sales'];
}
?>
<div class="card rounded-4 p-2">
    <canvas id="sales-yr-chart" height="350"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const tx = document.getElementById('sales-yr-chart');

new Chart(tx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($year) ?>,
        datasets: [{
            label: 'Amount of Sales per Year in Pesos',
            data: <?php echo json_encode($total) ?>,
            borderWidth: 1,
            backgroundColor: 'rgba(66, 110, 134, 1)'// Set the line color to orange
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
