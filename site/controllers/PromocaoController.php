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

        $this->produtos();
    }

    public function produtos() {

        include_once 'site/promocao/views/page/produtos.php';
    }
    public function carrinho() {

        include_once 'site/promocao/views/page/carrinho.php';
    }
    public function fichaDeCadastro() {

        include_once 'site/promocao/views/page/fichaDeCadastro.php';
    }

    public function eMarketing() {

        include_once 'site/promocao/views/page/ebook.php';
    }

    public function emailSequencial() {


        $enviar = $_GET['enviar'];
        if (isset($enviar) && $enviar === "agora") {

            $this->emailModel->enviarEmailsSequencia();
        } else {
            return;
        }
    }

    public function naoReceberEmail() {
        include_once 'site/promocao/views/page/cancelarEmail.php';
    }

    public function cancelarEnvioDeEmail() {


        $this->emailModel->naoReceberEmail($email);
    }

}
