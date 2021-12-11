# Notes

- Command Line Interface (CLI)
- Commands : `php bin/console mailer:mass:mailing`
- Commands : `php bin/console user:insertion`
- Use *https://mailtrap.io/* - GM.UDMG

- Local Email Testing
- `npm install -g maildev` - https://www.npmjs.com/package/maildev (MailDev)
- `maildev`

```
/*
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
*/
```