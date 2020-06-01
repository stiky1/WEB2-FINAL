<?php
include "api/config.php";
    if(isset($_POST['submit']))
    {
        $sql = "SELECT * FROM stats";
        $stm = $connect->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        $message = "";
        foreach ($result as $row)
        {
            $message .= $row['page'].": ".$row['count']."\r\n";
        }

        $mailTo = $_POST['email'];
        $subject = 'SSSB website stats';
        $headers = 'From: sssb@finalzadanie.com' . "\r\n" .
            'Reply-To: sssb@finalzadanie.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($mailTo, $subject, $message, $headers);
        header("Location: index.php?mailsent");
    }
?>