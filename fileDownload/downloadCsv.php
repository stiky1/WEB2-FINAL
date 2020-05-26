<?php
    include "../api/config.php";

    $sql = "SELECT * FROM logs";
    $stm = $connect->query($sql);
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['excelDownload']))
    {
        $csvName = "commands.csv";
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=".$csvName);
        $csvFile = fopen("php://output", "w");

        foreach ($result as $row)
        {
            fputcsv($csvFile, $row);
        }

        fclose($csvFile);
    }
?>


