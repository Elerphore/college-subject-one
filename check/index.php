<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'].'/fpdf/fpdf.php';
include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial', 'B', 16);
//$pdf->Cell(40, 10, 'name: '.$_SESSION['name']);
//$pdf->Cell(40, 10, 'name: '.$_SESSION['name']);
//$pdf->Cell(40, 10, 'name: '.$_SESSION['name']);
//$pdf->Cell(40, 10, 'name: '.$_SESSION['name']);
//$pdf->Output();

class PDF extends FPDF
{
// Page header
    function Header() {
        $this->Image('../assets/style/img/2.png',10,6,45);
        $this->SetFont('Arial','B',15);
        $this->Cell(75);
        $this->Cell(50,10,'Paradise: Check',1,0,'C');
        $this->Ln(40);
    }

    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

if(isset($_POST['check_req'])) {

        $sql = 'INSERT INTO record SET
		    Code = :code,
		    Date = :date,
		    Time = :time,
		    id_staff  = :id_staff,
            id_service =:id_service,
            id_client =:id_client';

        $s = $pdo-> prepare($sql);
        $s->bindValue(':code', $_POST['staff'] + $_POST['service'] + $_SESSION['id']);
        $s->bindValue(':date', date("Y-m-d"));
        $s->bindValue(':time', date("H:i"));
        $s->bindValue(':id_staff', $_POST['staff']);
        $s->bindValue(':id_service', $_POST['service']);
        $s->bindValue(':id_client', $_SESSION['id']);
        $s->execute();

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    $pdf->Cell(0,10,'Name: '. $_SESSION['name'],1,1);
    $pdf->Cell(0,10,'Surname:  '. $_SESSION['surname'],1,1);
    $pdf->Cell(0,10,'Patronymic '. $_SESSION['patronymic'], 1,1);
    $pdf->Cell(0,10,'Phone '. $_SESSION['phone'], 1,1);
    $pdf->Cell(0,10,'Bank: '. $_POST['bank_account'], 1,1);

    $query = 'SELECT Title, Cost FROM service where id = :id';
    $s = $pdo->prepare($query);
    $s->bindValue(':id', $_POST['service']);
    $s->execute();
    $service = $s->fetch();
    $pdf->Cell(0,10,'Service:  '. $service['Title'], 1,1);
    $pdf->Cell(0,10,'Price:  '. $service['Cost'], 1,1);

    $query = 'SELECT Title FROM specialties where id = :id';
    $s = $pdo-> prepare($query);
    $s->bindValue(':id', $_POST['specialist']);
    $s->execute();
    $special = $s->fetch();
    $pdf->Cell(0,10,'Specialist: '. $special['Title'], 1,1);


    $pdf->Output();
}


