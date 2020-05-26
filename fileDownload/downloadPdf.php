<?php
    include "../api/config.php";
    include "../pdf/fpdf.php";

    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            $this->SetFont('Arial','B',13);
            $this->Cell(70);
            $this->Cell(50,10,'Console commands',1,0,'C');
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $pdf = new PDF();
    //header
    $pdf->AddPage();
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',8);

    $header = array("Id", "Command", "Command Time", "Execution", "Execute Info");

    $sql = "SELECT * FROM logs";
    $stm = $connect->query($sql);
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($header as $heading)
    {
        $pdf->Cell(38,12,$heading,1);
    }

    foreach($result as $row)
    {
        $pdf->Ln();
        foreach($row as $column)
            $pdf->Cell(38,12,$column,1);
    }
    $pdf->Output("command.pdf", "D");

    //zdroj https://www.phpflow.com/php/generate-pdf-file-mysql-database-using-php/
?>

