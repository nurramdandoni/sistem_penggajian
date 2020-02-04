<?php 


$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
$pdf->AddPage();
        // $pdf->SetMargins(20,20,20,20);
$pdf->SetTitle('STRUK GAJI KARYAWAN');



        // gambar
        // Insert a logo in the top-left corner at 300 dpi
// $pdf->Image('image/logo.png',15,12,20,20);
        // Insert a dynamic image from a URL
        // $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');
        // setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',20);
        // mencetak string 
$pdf->cell(30);
$pdf->Cell(500,7,'SEKOLAH TINGGI',0,1,'L');
$pdf->cell(30);
$pdf->Cell(500,8,'TEKNOLOGI BANDUNG',0,1,'L');
$pdf->cell(30);
$pdf->SetFont('Arial','',8);
$pdf->Cell(500,4,'Jl. Soekarno Hatta No.378 Bandung - 40235',0,1,'L');
$pdf->cell(30);
$pdf->SetFont('Arial','',8);
$pdf->Cell(500,4,'Telp. (022) 522 4000 | website : https://sttbandung.ac.id | email : info@sttbandung.ac.id',0,1,'L');
$pdf->Ln(5,100);

// judul



$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'STRUK GAJI KARYAWAN',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(500,4,'',0,1,'L');
$pdf->cell(20);
$pdf->Cell(100,5,'Gaji Pokok',0,0,'L');
foreach($invoice->result() as $in){
        $pdf->Cell(60,5,'Rp. '.$in->gapok,0,1,'L');
}
$pdf->cell(20);
$pdf->Cell(100,5,'Insentif Bonus',0,0,'L');
foreach($invoice->result() as $in){
        $pdf->Cell(60,5,'Rp. '.$in->total_bonus,0,1,'L');
}
$pdf->cell(20);
$pdf->Cell(100,5,'Insentif Lembur',0,0,'L');
foreach($invoice->result() as $in){
        $pdf->Cell(60,5,'Rp. '.$in->total_lembur,0,1,'L');
}
$pdf->SetFont('Arial','B',10);
// $pdf->line();
$pdf->cell(20);
$pdf->Cell(100,5,'Total',0,0,'L');
foreach($invoice->result() as $in){
        $pdf->Cell(60,5,'Rp. '.$in->take_home_pay,0,1,'L');
}

$pdf->Output();


?>