<?php
namespace lib;

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
// Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Load dependencies from composer
//If this causes an error, run 'composer install'
require 'system/phpmailer/vendor/autoload.php';

class Email 
{

    //Classe configurada para enviar email através de conta do Google e PHPMailer
    private $de = 'mickael.souza.if@gmail.com';
    private $para;
    private $assunto;
    private $mensagem;
    private $html;
    private $replyUser;

    function __construct($para, $assunto, $mensagem, $html = NULL, $replyUser = null) 
    {
        $this->para = $para;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
        $this->html = $html;
		
		if($replyUser == null) {
			$this->replyUser = $this->de;
		}
    }

    public function send() 
    {
        
        
//Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();
        
        //CONFIGURAÇÕES PARA O XAMP NO WINDOWS DESATIVAR NO SERVIDOR 
        //https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting
        $mail->SMTPOptions =[
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
        
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;

//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Set AuthType to use XOAUTH2
        $mail->AuthType = 'XOAUTH2';

//Fill in authentication details here
//Either the gmail account owner, or the user that gave consent
        $email = $this->de;
        $clientId = '650637100521-l7vjuevtin11gkeilgk0u4536mt9dtk8.apps.googleusercontent.com';
        $clientSecret = '8YVq0ZY6c34mLDzuoICanxez';

//Obtained by configuring and running get_oauth_token.php
//after setting up an app in Google Developer Console.
        $refreshToken = '1/ey7h_uZ2ZpeXDpc4VCpde3CVzVwXMeS5EPmzgZAOBak';

//Create a new OAuth2 provider instance
        $provider = new Google([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret
        ]);

//Pass the OAuth provider instance to PHPMailer
        $mail->setOAuth(
                new OAuth([
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email
                ])
        );
		
		$mail->addReplyTo($this->replyUser, '');
		
//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
        $mail->setFrom($email, 'Batclub');

//Set who the message is to be sent to
        $mail->addAddress($this->para, $this->para);

//Set the subject line
        $mail->Subject = $this->assunto;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $mail->CharSet = 'utf-8';
        //$mail->msgHTML(file_get_contents('contentsutf8.html'), dirname(__FILE__));
        if (!$this->html)
            $this->html = $this->mensagem;
        $mail->msgHTML($this->html, dirname(__FILE__));

//Replace the plain text body with one created manually
        $mail->AltBody = $this->mensagem;

//Attach an image file
        // $mail->addAttachment('images/nos.jpg');
//send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            echo "<pre>";
            var_dump($this);
            echo "</pre>";
            die;
            return false;
        } else {
            return true;
        }
    }

}
