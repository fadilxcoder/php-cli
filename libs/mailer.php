<?php

    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    function massMailing()
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug 	= SMTP::DEBUG_LOWLEVEL;                      
            $mail->isSMTP();                                            
            $mail->Host       	= 'smtp.mailtrap.io';                
            $mail->SMTPAuth   	= true;                               
            $mail->Username   	= '7670025c440223';                 
            $mail->Password   	= '0e52440291f186';                           
            $mail->SMTPSecure 	= PHPMailer::ENCRYPTION_STARTTLS;     
            $mail->Port       	= 2525;                                
        
            

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