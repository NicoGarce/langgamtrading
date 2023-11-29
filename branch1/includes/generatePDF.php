<?php
require('../../assets/fpdf/fpdf.php');
require_once('../../includes/storeclass.php');
require('ord_function.php');

// Check if the order_id is provided in the request
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $pdf = new FPDF('P', 'mm', "A4");
    $invoiceTitle ="Invoice Order $order_id";
    $pdf->SetTitle($invoiceTitle);
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', 'B', 20);

    $pdf->Cell(66, 10, '', 0, 0, 'C');
    $pdf->Cell(62, 5, 'Langgam Trading', 0, 0, 'C');
    $pdf->Cell(59, 10, '', 0, 1, 'C');

    $pdf->SetFont('Helvetica', '', 10);
    $pdf->Cell(66, 10, '', 0, 0, 'C');
    $pdf->Cell(59, 5, '420 R. Magsaysay Avenue, Langgam, San Pedro, Laguna', 0, 0, 'C');
    $pdf->Cell(59, 10, '', 0, 1, 'C');
    
    // Access the order details using the get_order_by_id() method
    $orders = new Orders();
    $result = $orders->get_order_by_id($order_id);
    
    if ($result) {
        // Add customer information to the PDF
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(0, 10, 'Date: ' . $result->order_date, 0, 0, 'L'); // Left align
        $pdf->Cell(0, 10, 'Time: ' . $result->order_time, 0, 1, 'R'); // Right align


        $pdf->Cell(0, 10, 'Salesperson: ' . $result->salesperson, 0, 1);
        $pdf->Cell(0, 10, 'Order ID: ' . $result->order_id, 0, 0, 'L');
        $pdf->Cell(0, 10, 'Order Status: ' . $result->order_status, 0, 1, 'R');

        $list = json_decode($result->order_list);
        
        $pdf->SetFont('Helvetica', 'B', 10);

        $pdf->Cell(63, 10, 'Qty', 0, 0, 'C');
        $pdf->Cell(63, 10, 'Product Name', 0, 0, 'C');
        $pdf->Cell(63, 10, 'Price', 0, 1, 'C');

        foreach ($list as $orderItem) {
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->Cell(63, 10, $orderItem->quantity, 0, 0, 'C');
            $pdf->Cell(63, 10, $orderItem->product_name, 0, 0, 'C');
            $pdf->Cell(63, 10, 'PHP '.$orderItem->price, 0, 1, 'C');
        }


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(126, 10, 'Total: ', 0, 0, 'R');
        $pdf->Cell(63, 10, 'PHP '.$result->total_cost, 0, 1,'C');

        $pdf->SetFont('Helvetica', '', 10);

        $labelWidth = 40; 
        $valueWidth = 60;

        $pdf->Cell($labelWidth, 10, 'Customer Name       :', 0, 0);
        $pdf->Cell($valueWidth, 10, $result->customer_name, 0, 1); 

        $pdf->Cell($labelWidth, 10, 'Contact Information  :', 0, 0);
        $pdf->Cell($valueWidth, 10, $result->contact_info, 0, 1); 

        $pdf->Cell($labelWidth, 10, 'Order Type               :', 0, 0); 
        $pdf->Cell($valueWidth, 10, $result->order_type, 0, 1); 

        $pdf->Cell($labelWidth, 10, 'Shipping Details       :', 0, 0); 
        $pdf->Cell($valueWidth, 10, $result->shipping_details, 0, 1); 

        $pdf->Cell($labelWidth, 10, 'Payment Method      :', 0, 0); 
        $pdf->Cell($valueWidth, 10, $result->pay_method, 0, 1); 

        $pdf->Cell($labelWidth, 10, 'Payment Status        :', 0, 0); 
        $pdf->Cell($valueWidth, 10, $result->payment_status, 0, 1); 

        

        
    } else {
        $pdf->Cell(0, 10, 'Order not found.', 0, 1);
    }

    $pdf->Output($invoiceTitle . '.pdf', 'I');
} else {
    echo 'Order ID is missing in the request.';
}
?>