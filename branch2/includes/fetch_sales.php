<?php
require('../../assets/fpdf/fpdf.php');
require_once('../../includes/storeclass.php');

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];

    $store = new Langgam();
    $conn = $store->openConnection();

    $query = "SELECT sale_id, date_complete, time_complete, salesperson, pay_method, order_type, total_cost
              FROM branch2_sales
              WHERE date_complete BETWEEN :start_date AND :end_date";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':start_date', $startDate);
    $stmt->bindParam(':end_date', $endDate);
    $stmt->execute();
    $salesRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate PDF
    if (!empty($salesRecords)) {
        $pdf = new FPDF();
        $reportTitle = "Sales Report ($startDate)" . ' - ' . "($endDate)";
        $pdf->SetTitle($reportTitle);
        $pdf->AddPage();

        $totalCost = 0;

        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->Cell(66, 10, '', 0, 0, 'C');
        $pdf->Cell(62, 5, 'Langgam Trading', 0, 0, 'C');
        $pdf->Cell(59, 10, '', 0, 1, 'C');

        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(66, 10, '', 0, 0, 'C');
        $pdf->Cell(59, 5, '420 R. Magsaysay Avenue, Langgam, San Pedro, Laguna', 0, 0, 'C');
        $pdf->Cell(59, 10, '', 0, 1, 'C');
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->Cell(190, 10, 'Sales Report', 0, 1, 'C');
        if ($startDate !== $endDate) {
            $pdf->Cell(190, 10, $startDate . ' | ' . $endDate, 0, 1, 'C');
        } elseif ($startDate === $endDate) {
            $pdf->Cell(190, 10, $startDate, 0, 1, 'C');
        }



        // Define custom column names
        $columnNames = array('Sale ID', 'Date', 'Time', 'Salesperson', 'Payment', 'Type', 'Total');

        // Add table header
        $pdf->SetFont('Helvetica', 'B', 10);
        foreach ($columnNames as $columnName) {
            $pdf->Cell(28, 10, $columnName, 1);
        }
        $pdf->Ln();

        $pdf->SetFont('Helvetica', '', 10);
        // Initialize total

        // Add table rows
        foreach ($salesRecords as $record) {
            foreach ($record as $key => $value) {
                if ($key === 'total_cost') {
                    $totalCost += $value; // Update total
                }
                $pdf->Cell(28, 10, $value, 1);
            }
            $pdf->Ln();
        }

        // Display total at the end
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->Cell(168, 10, 'Total:', 0, 0, 'R');
        $pdf->Cell(28, 10, number_format($totalCost, 2), 0);
        $pdf->Ln();

        // Output the PDF
        $pdf->Output($reportTitle . '.pdf', 'I');
    } else {
        // No records found, show a message and close the window after 5 seconds
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>No Records Found</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    padding: 20px;
                }

                #message {
                    color: red;
                    font-size: 18px;
                    margin-bottom: 20px;
                }
            </style>
            <script>
                setTimeout(function () {
                    window.close();
                }, 5000);
            </script>
        </head>
        <body>
            <div id="message">No records found for the given date range.</div>
            <p>This window will close automatically in 5 seconds.</p>
        </body>
        </html>
        <?php
    }
} else {
    echo 'Invalid date range';
}
