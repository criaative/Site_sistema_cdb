<?php

require_once 'site/views/header.php';
?>



<section id="cadastroEmail">
    <div class="container">
        <div class="row">



            <div class="text-center col-md-14" >
                <div class="col-sm-7 col-sm-offset-2">
                   
                    <div style="margin-bottom: 50px">
                       
                        <br>
                        <br>
                        <strong style="font-size: 25px; margin-bottom: 50px; color: #fff;">"Digite o Email pra não receber o envio de promoções e vantagens da Casa dos banners"</strong>
                    </div>

                    <form   method="post" action="http://www.casadosbanners.com.br/Promocao&a=cancelarEnvioDeEmail">

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Digite o email">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="cancelar email marketing">
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>     

</section>
<section id="cadastroEmail">
    <br>
    <br>
    <br>
    <br>   
    <br>   
    <br>   
</section>
<?php

require_once 'site/views/footer.php';
?>
