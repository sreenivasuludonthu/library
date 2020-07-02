<?php
include ("connection.php");
include ('fpdf.php');
$db =  new PDO('mysql:host:localhost;dbname=student','root','');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('pic.png',10,7,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    //$this->Cell(80,10,'Students List',1,0,'C');
    // Line break
    $this->Ln(20);
	$this->Cell(65);
	$this->Cell(00,00,'Student Register List');
	$this->Ln(10);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
	// Position at 2.0 cm from bottom
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','B','I',8);
    // Page number
    $this->Cell(0,10,'AITS,RAJAMPET',0,0,'C');
}
function headerTable()
{
	 $this->SetFont('Times','B',12);
	 $this->Cell(25,10,'Roll number',1,0,'C');
	  $this->Cell(80,10,'Student Name',1,0,'C');
	   $this->Cell(20,10,'Branch',1,0,'C');
	    $this->Cell(20,10,'Section',1,0,'C');
		$this->Cell(80,10,'Email_ID',1,0,'C');
	    $this->Cell(30,10,'Register Date',1,0,'C');
		$this->Ln();
}
function viewTable()
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
	$con= new mysqli($servername, $username, $password, $dbname);
	 $this->SetFont('Times','',12);
	 $sql="select * from register";
	 $records=mysqli_query($con,$sql);
	 while($data=mysqli_fetch_array($records))
	 {
	 $this->Cell(25,10,$data['id'],1,0,'L');
	  $this->Cell(80,10,$data['name'],1,0,'L');
	   $this->Cell(20,10,$data['branch'],1,0,'L');
	    $this->Cell(20,10,$data['section'],1,0,'L');
		$this->Cell(80,10,$data['email'],1,0,'L');
	    $this->Cell(30,10,$data['registerdate'],1,0,'L');
		$this->Ln();
	 }
	
}
}

$pdf = new PDF();
//header
$pdf->AddPage('L','A4',0);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
?>