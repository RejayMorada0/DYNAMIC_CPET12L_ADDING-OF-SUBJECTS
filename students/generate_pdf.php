<?php

Class dbObj{
/* Database connection start */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "adding_subjects_db";
var $conn;
function getConnstring() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}



//include connection file 
include_once('libs/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('upload/tuplogo.png',10,2,30);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(100,10,'Adding of Subjects for Irregualr Students',1,0,'C');
    // Line break
    $this->Ln(20);
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
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('trans_id'=>'Transaction ID', 'stud_id'=> 'Student Number', 'sub_code'=> 'Subject Code','sub_name'=> 'Subject Name','yr_and_sem'=> 'Year And Semester' ,'grades'=> 'Grades' ,'remarks'=> 'Remarks');

$result = mysqli_query($connString, "SELECT * FROM student_request") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM student_request");

$pdf = new PDF();
//header
$pdf->AddPage("L","Legal");
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
foreach($header as $heading) {
$pdf->Cell(50,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(50,10,$column,1);
}
$pdf->Output();



?>