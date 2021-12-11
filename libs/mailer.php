<?php

    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    function massMailing()
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings

            /*
            * * self::DEBUG_OFF (`0`) No debug output, default
            * * self::DEBUG_CLIENT (`1`) Client commands
            * * self::DEBUG_SERVER (`2`) Client commands and server responses
            * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
            * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages.
            */
            
            // $mail->SMTPDebug 	= SMTP::DEBUG_LOWLEVEL;
            $mail->SMTPDebug 	= SMTP::DEBUG_CLIENT;
            $mail->SMTPSecure 	= PHPMailer::ENCRYPTION_STARTTLS;
            $mail->isSMTP();
/*
            $mail->Host       	= 'smtp.mailtrap.io';
            $mail->SMTPAuth   	= true;
            $mail->Username   	= '7670025c440223';
            $mail->Password   	= '0e52440291f186';
            $mail->Port       	= 2525;
*/
            $mail->Host       	= 'localhost';                
            $mail->SMTPAuth   	= null;                               
            $mail->Username   	= null;                 
            $mail->Password   	= null;                           
            $mail->Port       	= 1025;                                
            $mail->Timeout      = 30;
            $mail->SMTPOptions  = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];


            $mail->isHTML(true); 
        
            foreach (selectAll() as $data) {
                //Recipients
                $mail->setFrom('no-reply@fadilxcoder.dev', 'FX');
                $mail->addAddress($data['email'], $data['name'].' '.$data['surname']); 
                $mail->addReplyTo('fadil@xcoder.dev', 'FRACTAL X - Techno For Acid');
                $mail->Subject = 'Techno For Acid Rave VIP';
                $mail->Body    = '<p>Hi,<br><br> Calling for Ravers @ <b>Techno for Acid Rave VIP</b> Party.<br> More information will be provided soon !<br><br><small>FRACTAL X</small></p>';
                $mail->AltBody = 'Calling for Ravers at Techno for Acid Rave VIP Party. More information will be provided soon ! FRACTAL X';
            
                $mail->send();
                echo 'Message has been sent';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>