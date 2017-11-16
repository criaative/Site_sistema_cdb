<?php

class SiteController {
    
       public function index()
    {
        
        $this->loja();
       
    }

    public function home()
    {
       
        include "site/views/index.php";
     
    }
    
    public function contador()
    {
        include "views/page/contador.php";

     
    }
    public function blog()
    {
      include "site/blog/views/index.php";
     
    }
    public function promocao()
    {
        include "site/promocao/views/index.php";

     
    }
    
    public function contato()
    {
        include "site/views/page/contato.php";

     
    }
    public function loja()
    {
        header("Location: loja/");

     
    }
    
   


}
