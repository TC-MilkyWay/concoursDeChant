<?php
require "config/bdds.php"; 

//partie submit inscription



    // function smtpmailer($to, $from, $from_name, $subject, $body)
    //     {
    //         $mail = new PHPMailer();
    //         $mail->IsSMTP();
    //         $mail->SMTPAuth = true; 
     
    //         $mail->SMTPSecure = 'ssl'; 
    //         $mail->Host = 'smt.gmail.com';
    //         $mail->Port = 465;  
    //         $mail->Username = 'yohanngille@gmail.com';
    //         $mail->Password = '';   
       
    //    //   $path = 'reseller.pdf';
    //    //   $mail->AddAttachment($path);
       
    //         $mail->IsHTML(true);
    //         $mail->From="yohanngille@gmail.com";
    //         $mail->FromName=$from_name;
    //         $mail->Sender=$from;
    //         $mail->AddReplyTo($from, $from_name);
    //         $mail->Subject = $subject;
    //         $mail->Body = $body;
    //         $mail->AddAddress($to);
    //         if(!$mail->Send())
    //         {
    //             $error ="Please try Later, Error Occured while Processing...";
    //             return $error; 
    //         }
    //         else 
    //         {
    //             $error = "Thanks You !! Your email is sent.";  
    //             return $error;
    //         }
    //     }
        
    //     $to   = $email;
    //     $from = 'yohanngille@gmail.com';
    //     $name = 'yoyoyo';
    //     $subj = 'PHPMailer 5.2 testing from DomainRacer';
    //     $msg = '';
        
    //     $error=smtpmailer($to,$from, $name ,$subj, $msg);
        
    ?>