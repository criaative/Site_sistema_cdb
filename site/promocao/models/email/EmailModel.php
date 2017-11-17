<?php

/*
 * Emails
 */

/**
 * Description of emailModel
 *
 * @author Projeto
 */
require_once 'conexao/Conexao.php';
require_once 'EmailConfirmacao.php';
require_once 'EmailSequencia.php';

class EmailModel {

    private $id;
    private $email;
    private $status;
    private $dataAdd;
    private $con;
    private $confirmacao;
    private $enviados;
    private $sequencia;

    public function __construct() {
        $this->con = new Conexao();
        $this->status = 0;
        $this->dataAdd = date("Y-m-d H:i:s");
        $this->confirmacao = new EmailConfirmacao();
        $this->sequencia = new EmailSequencia();
    }

    public function setEnviados($enviados) {
        $this->enviados = $enviados;
        
    }

    public function gravarEnviados($id) {
        $this->enviados = $id;

        $sql = 'INSERT INTO aw_email_enviados 
            (id_email_clientes, data_add,status) VALUES 
            (:email,"' . $this->dataAdd . '",1)';

        $captureEmail[':email'] = $this->enviados;
        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute($captureEmail);
    }

    public function capturaEmail($email) {
        $sql = 'INSERT INTO aw_email_clientes 
            (email, status, data_add) VALUES 
            (:email,' . $this->status . ',"' . $this->dataAdd . '")';

        $captureEmail[':email'] = $email;
        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute($captureEmail);

        $id = $this->con->lastInsertId($capture);
        $this->email = $id;
        return $id;
    }

    public function enviarEmail($email, $id) {

        $this->confirmacao->confirmarEmail($email, $id);
    }

    public function enviarEmailsSequencia() {

       
        
        $this->sequencia->enviarEmails();
        
        
   
        
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

    

    function setEmail($email) {
        $this->email = $email;
    }

    /* public function statusEmail($email) {

      } */

    function setStatus($id) {

        $this->status = 1;
        $sql = "UPDATE aw_email_clientes SET status='" . $this->status . "', data_edit='" . $this->dataAdd . "' WHERE id=" . $id;

        $capture = $this->con->pdo()->prepare($sql);
        $capture->execute();
        $this->gravarEnviados($id);
    }

    function setDataAdd($dataAdd) {
        $this->dataAdd = $dataAdd;
    }

}
