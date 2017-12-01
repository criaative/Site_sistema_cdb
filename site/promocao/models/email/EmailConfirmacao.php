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

class EmailConfirmacao {
    
    
    public function confirmarEmail($email,$id) {
        
        
       
        
            $quebra_linha = "\n";
            $emailsender = 'banners@casadosbanners.com.br';
            $emaildestinatario = $email;
            
            
            $assunto ="email teste";
            

            $html ='
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
                    <h2>Olá aqui é o Kiko </h2>
                    <span>gestor da Casa dos Banners </span>
                </div>
            </div>
            <div id="main">

                <p> 
                    Mussum Ipsum, cacilds vidis litro abertis. Leite de capivaris, leite de mula 
                    manquis sem cabeça. Detraxit consequat et quo num tendi nada. Si num tem leite
                    então bota uma pinga aí cumpadi! Quem manda na minha terra sou euzis!</p>
                <br>
                <p>
                    In elementis mé pra quem é amistosis quis leo. Paisis, filhis, espiritis 
                    santis. Casamentiss faiz malandris se pirulitá. 
                    <a href="http://www.casadosbanners.com.br/index.php?c=capturaEmail&a=emailValido&v='.$id.'"> Link link </a>  
                    Praesent vel viverra nisi. Mauris aliquet nunc non turpis scelerisque, eget.</p>
                <br>
                <p> 
                    Delegadis gente finis, bibendum egestas augue arcu ut est. Tá deprimidis, 
                    eu conheço uma cachacis que pode alegrar sua vidis. Mé faiz elementum girarzis, 
                    nisi eros vermeio. Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, 
                    aguis e fermentis.</p>
                <br>
                <p> 
                    Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. 
                    Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! Manduma pindureta 
                    quium dia nois paga. Viva Forevis aptent taciti sociosqu ad litora torquent.</p>
                <br>
                <p> 
                    Suco de cevadiss deixa as pessoas mais interessantis. Quem num gosta di mim que vai 
                    caçá sua turmis! Cevadis im ampola pa arma uma pindureta. Vehicula non. Ut sed ex eros. 
                    Vivamus sit amet nibh non tellus tristique interdum. </p>

            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>

                ';

          //  echo $html;
            
         
           

              $mail = new  Swift_Message();
              $mail->setSender('banners@casadosbanners.com.br'); // enviando
              $mail->setTo($emaildestinatario); // recebendo
              $mail->setSubject($assunto);
              $mail->setBody($html, 'text/html');

              $server = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
              $server->setUsername($emailsender);
              $server->setPassword('123456cdb');
              
              $carteiro = new Swift_Mailer($server);
              $carteiro->send($mail);
            
             /* 
              * $headers = "MIME-Version: 1.0" . $quebra_linha;
              $headers .= "Content-type: text/html; charset=utf-8" . $quebra_linha;
              $headers .= "From: " . $emailsender . $quebra_linha;
              $headers .= "Return-Path ".$emailsender.$quebra_linha;
              $headers .= "Reply-to: ".$emailsender .$quebra_linha;


              mail($emaildestinatario, $assunto, $html, $headers, "-r" . $emailsender);*/
    }
}
