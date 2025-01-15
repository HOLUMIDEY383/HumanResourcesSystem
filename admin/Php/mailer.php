<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mailer
 *
 * @author faruq
 */

    use PHPMailer\PHPMailer\PHPMailer;


        require_once '../PHPMailer/PHPMailer.php';
        require_once '../PHPMailer/SMTP.php';
        require_once '../PHPMailer/Exception.php';

        $mail = new PHPMailer();


//SMTP Settings.
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "faruqodetola1@gmail.com";
        $mail->Password = 'akintunde';
        $mail->Port = 465;  //ssl=465, tsl=587;
        $mail->SMTPSecure = "ssl";  //ssl=465, tsl=587;
//Email Settings
        $mail->isHTML(true);
        $mail->setFrom("miliano6041@gmail.com","Faruqmail");
        $mail->addAddress("faruqodetola1@gmail.com");
        $mail->Subject="tesgfgsfdgdfgdsfgdfgdfsgfgdfgdfgting";
        $mail->Body="testidsfsdfsgfsgfgfdgdfsggfgngbody";
//        $mail->setFrom($usermail, $userName);
//        $mail->addAddress($schoolemail);
//        $mail->Subject($subjectmail);
//        $mail->Body($mailbody);

        try {
            $mail->send();
            echo "Message sent to:  {$mail->ErrorInfo}\n";
        } catch (Exception $e) {
            echo "Mailer Error ({$user['email']}) {$mail->ErrorInfo}\n";
        }
    


