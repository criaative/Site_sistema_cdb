<?php

/*
 * Dispoem das paginas de serviço
 */

/**
 * Description of PaginaController
 *
 * @author Projeto
 */
require_once 'site/promocao/models/email/EmailModel.php';

class PromocaoController {

    private $emailModel;

    function __construct() {
        $this->emailModel = new EmailModel();
    }

    public function index() {

        $this->Produtos();
    }

    public function Produtos() {

        include_once 'site/promocao/views/page/fichaDeCadastro.php';
    }

    public function eMarketing() {

        include_once 'site/promocao/views/page/ebook.php';
    }

    public function emailSequencial() {
        $enviar = 1;

        
        
        if ($enviar === 1) {

            $this->emailModel->enviarEmailsSequencia();
        }else{
            return;
        }
    }

}
