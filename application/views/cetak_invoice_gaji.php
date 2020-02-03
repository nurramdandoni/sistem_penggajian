<?php 


$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
$pdf->AddPage();
        // $pdf->SetMargins(20,20,20,20);
$pdf->SetTitle('Laporan Absensi Mahasiswa');



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
$pdf->Cell(0,10,'ABSENSI KEHADIRAN MAHASISWA',0,1,'C');

$pdf->Output();


?>