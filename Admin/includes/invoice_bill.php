<?php
session_start();

include_once("../fpdf/fpdf.php");

if ($_GET["receiptDate"] && $_GET["staffID"]) {
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",16);
	$pdf->Cell(190,10,"inCare Pharmacy",0,1,"C");
	$pdf->setFont("Arial",null,12);

	$pdf->Cell(50,10,"Date",0,0);
	$pdf->Cell(50,10,": ".$_GET["receiptDate"],0,1);
	$pdf->Cell(50,10,"Member ID",0,0);
	$pdf->Cell(50,10,": ".$_GET["memberID"],0,1);

	$pdf->Cell(50,10,"",0,1);


	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Quantity",1,0,"C");
	$pdf->Cell(40,10,"Price",1,0,"C");
	$pdf->Cell(40,10,"Total (RM)",1,1,"C");

	for ($i=0; $i < count($_GET["productID"]) ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
		$pdf->Cell(70,10, $_GET["pro_name"][$i],1,0,"C");
		$pdf->Cell(30,10, $_GET["qty"][$i],1,0,"C");
		$pdf->Cell(40,10, $_GET["price"][$i],1,0,"C");
		$pdf->Cell(40,10, ($_GET["qty"][$i] * $_GET["price"][$i]) ,1,1,"C");
	}

	$pdf->Cell(50,10,"",0,1);

	$pdf->Cell(50,10,"Sub Total",0,0);
	$pdf->Cell(50,10,":RM ".$_GET["receiptSubTotal"],0,1);
	$pdf->Cell(50,10,"Tax",0,0);
	$pdf->Cell(50,10,":RM ".$_GET["receiptTax"],0,1);
	$pdf->Cell(50,10,"Discount",0,0);
	$pdf->Cell(50,10,": ".$_GET["receiptDiscount"]. "%",0,1);
	$pdf->Cell(50,10,"Paid",0,0);
	$pdf->Cell(50,10,":RM ".$_GET["paid"],0,1);
	$pdf->Cell(50,10,"Net Total",0,0);
	$pdf->Cell(50,10,":RM ".$_GET["receiptNetTotal"],0,1);
	$pdf->Cell(50,10,"Balance",0,0);
	$pdf->Cell(50,10,":RM ".$_GET["due"],0,1);
	$pdf->Cell(50,10,"Payment Type",0,0);
	$pdf->Cell(50,10,": ".$_GET["receiptPayType"],0,1);


	$pdf->Cell(180,10,"Signature",0,0,"R");

	$pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["staffID"].".pdf","F");

	$pdf->Output();	

}


?>