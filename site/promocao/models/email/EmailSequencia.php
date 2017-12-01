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

        $sql = 'SELECT * FROM aw_email_relacionamento where status=1';


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

        set_time_limit(120);
        
        $emails = $this->getSequenciaEmail();
        foreach ($emails as $v) {
            if (($enviados['order'] + 1) == $v['ordem']) {



                $this->getEmail($enviados['id_email_clientes']);

                $quebra_linha = "\n";
                $emailsender = 'banners@casadosbanners.com.br';
                $emaildestinatario = $this->getEmail($enviados['id_email_clientes']);



                $assunto = $v['assunto'];


                $html = '<!DOCTYPE html>
                    <html lang= "pt-br">
                        <head>
                            <meta charset="utf-8">
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
                                p{
                                    font-size: 20px;
                                    text-align: left;
                                }
                                 #footer {

                                    padding: 50px;
                                    font-size: 14px;
                                }

                            </style>
                        </head>
                        <body>
                            <div id="wrap">
                                <div id="top">
                                    <img src="http://www.casadosbanners.com.br/images/logo.png" width="25%">
                                     <div id="topB">
                                        <h2>'. $v['titulo'] .'</h2>
                                        <span>'. $v['sub_titulo'] .'</span>
                                      </div>
                                </div>
                                <div id="main">
                                    '. $v['texto_email'] . '
                                </div>
                                <div id="footer">
                                    <span>Atenção: Está Mensagem é automática, Não E Necessário Responde-la. 
                                        Se Você Não deseja Mais Receber NOSSOS e-mails, cancele SUA Inscrição <a href="http://www.casadosbanners.com.br/Promocao&a=naoReceberEmail">Clique aqui</a> .</span>
                                </div>
                            </div>
                        </body>
                    </html>

                ';

               // echo $html;

$emailsender ='mkt@casadosbanners.com.br';
                
                $headers = "MIME-Version: 1.0" . $quebra_linha;
              $headers .= "Content-type: text/html; charset=utf-8" . $quebra_linha;
              $headers .= "From: " . $emailsender . $quebra_linha;
              /*
              $headers .= "Return-Path ".$emailsender.$quebra_linha;
              $headers .= "Reply-to: ".$emailsender .$quebra_linha;
*/

              mail($emaildestinatario[0]['email'], $assunto, $html, $headers, "-r" . $emailsender);
                

              /*  $mail = new Swift_Message();
                $mail->setSender('banners@casadosbanners.com.br'); // enviando
                $mail->setTo($emaildestinatario[0]['email']); // recebendo
                $mail->setSubject($assunto);
                $mail->setBody($html, 'text/html');

                $server = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
                $server->setUsername('banners@casadosbanners.com.br');
                $server->setPassword('123456cdb');

                $carteiro = new Swift_Mailer($server);
                $carteiro->send($mail);*/

                $ordem = $enviados['order'] + 1;
                $id = $enviados['id_email_clientes'];



                $this->addEnviados($id, $ordem);
                
            }
                
        }
    }

    public function addEnviados($id, $ordem) {




        $sql = "INSERT INTO sistemacdb2.aw_email_enviados 
             (id_email_clientes, id_ordem, data_envio, status) 
             VALUES 
             (:id, :ordem, :data, '1')";

        $captureEmail[':id'] = $id;
        $captureEmail[':ordem'] = $ordem;
        $captureEmail[':data'] = date("Y-m-d H:i:s");
        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute($captureEmail);
    }

    public function getEnviados() {

        $sql = "SELECT *, max(id_ordem) AS 'order' FROM aw_email_enviados where status=1 group by id_email_clientes ";


        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute();
        $dados = $capture->fetchAll(PDO::FETCH_ASSOC);

        $this->enviados = $dados;
        return $this->enviados;
    }

    public function getEmail($id) {

        $sql = 'SELECT * FROM aw_email_clientes where id=:id AND status=1';

        $captureEmail[':id'] = $id;
        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute($captureEmail);
        $dados = $capture->fetchAll(PDO::FETCH_ASSOC);

        $this->email = $dados;

        return $dados;
    }

}
