<!DOCTYPE html>
<html>
<head>
    <?php

include "../koneksi.php";
require('../admin/laporan/plugin/fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm','Letter');

$pdf->AddPage();

$pdf->SetFont('Times','B',16);
$pdf->Cell(0,7,'LAPORAN DATA BARANG KELURAHAN PELITA',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B',10);

$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(20,6,'Kode Barang',1,0,'C');
$pdf->Cell(50,6,'Nama Barang',1,0,'C');
$pdf->Cell(30,6,'Kategori',1,0,'C');
$pdf->Cell(30,6,'Kondisi',1,0,'C');
$pdf->Cell(30,6,'Jumlah',1,0,'C');
$pdf->Cell(20,6,'Tanggal',1,1,'C');

$pdf->SetFont('Times','',10);



$no=1;

//Query untuk mengambil data mahasiswa pada tabel mahasiswa
$hasil = mysqli_query($koneksi, "select * from tbbarang order by kode_barang asc");
while ($data = mysqli_fetch_array($hasil)){
    
    $pdf->Cell(8,6,$no,1,0);
    $pdf->Cell(20,6,$data['kode_barang'],1,0);
    $pdf->Cell(50,6,$data['nama_barang'],1,0);
    $pdf->Cell(30,6,$data['kategori'],1,0);
    $pdf->Cell(30,6,$data['kondisi'],1,0);
    $pdf->Cell(30,6,$data['stok'],1,0);
    $pdf->Cell(20,6,$data['tanggal'],1,1);
    $no++;
}

$pdf->Output();
?>
</head>
<body>

</body>
</html>

