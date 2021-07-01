<?php 
namespace App\Controllers;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;





class Mail
{
    public static function sendConfirm($receiver = "", $name = "User", $url = "")
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'maitram.net@gmail.com';                     //SMTP username
            $mail->Password   = 'nfruhrxkpogmyaql';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('maitram.net@gmail.com', 'Mekolink Shop');
            $mail->addAddress($receiver, $name);     //Add a recipient
           # $mail->addAddress('ellen@example.com');               //Name is optional
            #$mail->addReplyTo('maitram.net@gmail.com', 'Information');
            #$mail->addCC('cc@example.com');
           # $mail->addBCC('bcc@example.com');

            //Attachments
            #$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = __CONFIRM_MAIL__;

            ob_start();
            include __VIEW__.'/emailConfirm.php';
            $string = ob_get_clean();

            $mail->Body    = $string;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            \Core\Helper::redirect('services/send-mail');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


