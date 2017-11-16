

<?php

require_once 'site/views/header.php';

require_once 'site/views/menu.php';

?>


    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Blog</h1>
                            <p>Casa dos Banners</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                
               
                <?php 
                require_once 'site/blog/views/page/indexBlog.php';
                require_once 'site/blog/views/page/menuBlog.php';
                ?>
                
            </div>
        </div>
    </section>
    <!--/#blog-->

   <?php    require_once 'site/views/footer.php'; ?>
