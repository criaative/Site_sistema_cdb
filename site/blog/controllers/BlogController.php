<?php

class BlogController {
    
       public function index()
    {
        
        $this->Blog();
       
    }

    public function Blog()
    {
    
        include "views/index.php";
     
    }
    
    public function View()
    {
        
        include "views/page/viewBlog.php";

     
    }
    
   


}
