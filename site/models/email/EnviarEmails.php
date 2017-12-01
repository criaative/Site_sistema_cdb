<?php

/*
 * Classe para envio de emails padrão
 */

/**
 * Description of EnviarEmails
 *
 * @author Projeto
 */
class EnviarEmails {

    public function enviarEmail($email, $assunto, $html) {

        $mail = new Swift_Message();
        $mail->setSender('banners@casadosbanners.com.br'); // enviando
        $mail->setTo($emaildestinatario[0]['email']); // recebendo
        $mail->setSubject($assunto);
        $mail->setBody($html, 'text/html');

        $server = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
        $server->setUsername('banners@casadosbanners.com.br');
        $server->setPassword('123456cdb');

        $carteiro = new Swift_Mailer($server);
        $carteiro->send($mail);
    }

}
