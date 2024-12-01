<?php
require_once('../vendor/tcpdf/resources/autoload.php');


// Try to create an instance of the TCPDF class
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->Write(0, 'Test PDF', '', 0, 'C', true, 0, false, false, 0);
$pdf->Output('test.pdf', 'I');
?>
