<?php

$store = new Langgam();
$conn = $store->openConnection();

$stmt = $conn->prepare('SELECT
    EXTRACT(MONTH FROM order_date) AS order_month,
    EXTRACT(YEAR FROM order_date) AS order_year,
    SUM(total_cost) AS total_sales
    FROM
        branch1_sales
    GROUP BY
        order_month,
        order_year
    ORDER BY
        order_year,
        order_month;');
$stmt->execute();

$monthyear = []; // To store month names
$total = [];     // To store total sales

// Define a dictionary to map month numbers to month names
$month_mapping = [
    1 => "January",
    2 => "February",
    3 => "March",
    4 => "April",
    5 => "May",
    6 => "June",
    7 => "July",
    8 => "August",
    9 => "September",
    10 => "October",
    11 => "November",
    12 => "December"
];

foreach ($stmt as $data) {
    $numeric_month = $data['order_month'];
    $month_word = $month_mapping[$numeric_month];
    
    if ($month_word) {
        $monthyear[] = $month_word . ' ' . $data['order_year'];
    } else {
        $monthyear[] = "Invalid Month"; // Handle invalid month number
    }

    $total[] = $data['total_sales'];
}
?>




<div class="card rounded-4 p-2 ">
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(($monthyear)) ?>,
            datasets: [{
                label: '# Amount of Sales in Php',
                data: <?php echo json_encode(($total))?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>