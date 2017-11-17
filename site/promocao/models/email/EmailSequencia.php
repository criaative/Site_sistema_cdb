<?php

/*
 * Email de confirmação de email.
 */

/**
 * Description of EmailResposta
 *
 * @author Projeto
 */
require_once 'vendor/autoload.php';
require_once 'conexao/Conexao.php';

class EmailSequencia {

    private $sequenciaEmail;
    private $con;

    public function __construct() {
        $this->con = new Conexao();
    }

    public function getSequenciaEmail() {

        $sql = 'SELECT * FROM aw_email_relacionamento';


        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute();
        $dados = $capture->fetchAll(PDO::FETCH_ASSOC);

        $this->sequenciaEmail = $dados;

        return $dados;
    }

    public function enviarEmails() {
        $enviados = $this->getEnviados();
        foreach ($enviados as $v) {

            $this->sequenciaEmail($v);
        }
    }

    public function sequenciaEmail($enviados) {

        $emails = $this->getSequenciaEmail();
        foreach ($emails as $v) {
            if (($enviados['id_ordem'] + 1) == $v['ordem']) {








                $this->getEmail($enviados['id_email_clientes']);

                $quebra_linha = "\n";
                $emailsender = 'banners@casadosbanners.com.br';
                $emaildestinatario = $this->getEmail($enviados['id_email_clientes']);



                $assunto = "email teste";


                $html = '
                <!DOCTYPE html>
                    <html lang= "pt-br">
    <head>
        <style>

            #wrap{
                margin: auto;
                max-width: 750px;
            }
            #topB{
                height: 125px;
                background-image: url(" http://www.casadosbanners.com.br/images/top_bg.png");
                padding-top: 15px;
                padding-left: 15px;
            }
            #main{
                margin: auto;
                max-width: 650px;
                text-align: center;
            }

        </style>
    </head>

    <body>
        <div id="wrap">
            <div id="top">
                <img src="http://www.casadosbanners.com.br/images/logo.png" width="25%">

                <div id="topB">
                    <h2>' . $v['descricao'] .
                        '
                </h2>
                    <span>Primeiro email</span>
                </div>
            </div>
            <div id="main">

                <p> ' . $v['texto_email'] .
                        '</p>

            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>

                ';

                //echo $html;








                
                  $mail = new Swift_Message();
                  $mail->setSender('projeto@casadosbanners.com.br'); // enviando
                  $mail->setTo($emaildestinatario[0]['email']); // recebendo
                  $mail->setSubject($assunto);
                  $mail->setBody($html, 'text/html');

                  $server = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
                  $server->setUsername('projeto@casadosbanners.com.br');
                  $server->setPassword('cdb123456');

                  $carteiro = new Swift_Mailer($server);
                  $carteiro->send($mail); 
                  
                $ordem = $enviados['id_ordem'] + 1;
                $id = $enviados['id_email_clientes'];

                $this->addEnviados($id, $ordem);
            }
        }
    }

    public function addEnviados($id, $ordem) {




        $sql = "INSERT INTO sistemacdb2.aw_email_enviados 
             (id_email_clientes, id_ordem, data_add, data_envio, status) 
             VALUES 
             (:id, :ordem, :data, :data, '1')";

        $captureEmail[':id'] = $id;
        $captureEmail[':ordem'] = $ordem;
        $captureEmail[':data'] = date("Y-m-d H:i:s");
        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute($captureEmail);
    }

    public function getEnviados() {

        $sql = 'SELECT * FROM aw_email_enviados where status=1';


        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute();
        $dados = $capture->fetchAll(PDO::FETCH_ASSOC);

        $this->enviados = $dados;
        return $this->enviados;
    }

    public function getEmail($id) {

        $sql = 'SELECT * FROM aw_email_clientes where id=:id; AND status=1';

        $captureEmail[':id'] = $id;
        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute($captureEmail);
        $dados = $capture->fetchAll(PDO::FETCH_ASSOC);

        $this->email = $dados;

        return $dados;
    }

}
