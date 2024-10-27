<?php 

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        
        //Crear el objeto de email
        // Looking to send emails in production? Check out our Email API/SMTP product!
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '5d30a04cabc2df';
        $mail->Password = '600732b1358759';

        $mail->setFrom('haroldgm1015@gmail.com');
        $mail->addAddress('haroldgm1015@gmail.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones() {

         //Crear el objeto de email
        // Looking to send emails in production? Check out our Email API/SMTP product!
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '5d30a04cabc2df';
        $mail->Password = '600732b1358759';

        $mail->setFrom('haroldgm1015@gmail.com');
        $mail->addAddress('haroldgm1015@gmail.com', 'AppSalon.com');
        $mail->Subject = 'Restablece tu password';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer Password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}


