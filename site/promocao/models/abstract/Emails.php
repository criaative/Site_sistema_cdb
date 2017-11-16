<?php

/*
 * Base emails promoção.
 */

/**
 * Description of emails
 *
 * @author Projeto
 */
abstract class Emails {
    
    private $id;
    private $email;
    private $status;
    private $dataAdd;
    
    public function capturaEmail($email);
    
    public function enviarEmail($email);
    
    public function statusEmail($email);
    
    
}
