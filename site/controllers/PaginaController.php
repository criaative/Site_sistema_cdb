<?php

/*
 * Dispoem das paginas de serviço
 */

/**
 * Description of PaginaController
 *
 * @author Projeto
 */
class PaginaController {
    
    public function index() {

        $this->Produtos();
    }
    
    public function Produtos(){
       
        include_once 'site/promocao/views/page/fichaDeCadastro.php';
    }
    
}
