<?php
    include "../api/config.php";
    include "../pdf/fpdf.php";

    if(isset($_POST['pdfDownload']))
    {
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                $this->SetFont('Arial', 'B', 13);
                $this->Cell(70);
                $this->Cell(50, 10, 'Console commands', 1, 0, 'C');
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        $pdf = new PDF();
        //header
        $pdf->AddPage();
        //foter page
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 8);

        $header = array("Id", "Command", "Command Time", "Execution", "Execute Info");

        $sql = "SELECT * FROM logs";
        $stm = $connect->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($header as $heading) {
            $pdf->Cell(38, 12, $heading, 1);
        }

        foreach ($result as $row) {
            $pdf->Ln();
            foreach ($row as $column)
                $pdf->Cell(38, 12, $column, 1);
        }
        $pdf->Output("command.pdf", "D");
    }

    else if(isset($_POST['pdfDownloadSvk']))
    {
        $file = 'api_svk.pdf';

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    else if(isset($_POST['pdfDownloadEng']))
    {
        $file = 'api_eng.pdf';

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

?>

