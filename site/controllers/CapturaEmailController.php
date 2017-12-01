<?php

/*
 * Capturar email de clientes, para promoções e novidades. 
 */

/**
 * Description of CapturaEmailController
 *
 * @author Projeto
 */
require_once 'site/promocao/models/email/EmailModel.php';

class CapturaEmailController {

    private $capEmail;

    function __construct() {
        $this->capEmail = new EmailModel();
    }

    public function index() {

        $this->capturaEmail();
    }

    public function capturaEmail() {

        $email = $_POST['email'];

        if ($email) {
            $confere = $this->capEmail->getEmails($email);
            if (!($confere)) {
                $id = $this->capEmail->capturaEmail($email);

                $this->capEmail->enviarEmail($email, $id);


                echo '<script>';
                echo "window.alert('Confirme o email');";
                echo "location.replace('index.php');";
                echo '</script>';
            } else {

                $this->capEmail->setStatus($confere[0]['id']);
                echo '<script>';
                echo "window.alert('Email já Cadastrado');";
                echo "location.replace('Promocao');";
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo "window.alert('Email não preenchido');";
            echo "location.replace('Promocao');";
            echo '</script>';
        }
    }

    public function emailValido() {
        $id = $_GET['v'];
       

        
            set_time_limit(60);
            $id = $this->capEmail->capturaEmail($v);




            $confereEmail = $this->capEmail->getEmail($id);

            if ($confereEmail == TRUE) {
                $this->capEmail->setStatus($id);
            } else {
                $this->capEmail->capturaEmail($email);
                $this->capEmail->setStatus($id);
            }
        

          header("Location: Promocao&a=eMarketing&e=1");
    }

}
