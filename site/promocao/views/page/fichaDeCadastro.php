<?php

require_once 'site/views/header.php';
?>


<section id="cadastroTop">
    <div class="container">
        <div class="row">

            <div class="text-center col-md-14" >
                <div class="col-sm-2">
                    <img src="images/logo2.png" width="100%"/>
                </div>
                <div class="col-sm-7 col-sm-offset-1">
                    <div class="col-md-3" >
                        <img src="images/ebook.png" alt="ebook" width="80%"/>
                    </div>
                    <div style="margin-bottom: 50px">
                        <strong style="font-size: 25px; color: #fff;">Ganhe um ebook <span style="color: red">" Totalmente Grátis "</span></strong>
                        <br>
                        <br>
                        <strong style="font-size: 25px; margin-bottom: 50px; color: #fff;">"Resolva em definitivo seus problemas com produtos de divulgação imobiliária "</strong>
                    </div>

                    <form  method="post" action="index.php?c=capturaEmail&a=capturaEmail">

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Digite Seu melhor email">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-submit">Quero ter o ebook Agora</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>     

</section>
<section id="company-information" class="padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="images/aboutus/1.png" class="img-responsive" alt="">
            </div>
            <div class="col-sm-6 ">
                <p>Mussum Ipsum, cacilds vidis litro abertis. Si num tem leite então bota uma pinga aí cumpadi! Em pé sem cair,
                    deitado sem dormir, sentado sem cochilar e fazendo pose. Todo mundo vê os porris que eu tomo, 
                    mas ninguém vê os tombis que eu levo! Sapien in monti palavris qui num significa nadis i pareci latim.</p>


                <p>Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. 
                    A ordem dos tratores não altera o pão duris. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis. 
                    Leite de capivaris, leite de mula manquis sem cabeça.</p>

                <p>Quem num gosta di mim que vai caçá sua turmis! Nec orci ornare consequat. Praesent lacinia ultrices consectetur.
                    Sed non ipsum felis. Viva Forevis aptent taciti sociosqu ad litora torquent. Copo furadis é disculpa de bebadis, 
                    arcu quam euismod magna.</p>
            </div>
        </div>
    </div>
</section>
<section id="cadastroEmail">
    <div class="container">
        <div class="row">



            <div class="text-center col-md-14" >
                <div class="col-sm-7 col-sm-offset-2">
                    <div class="col-md-3" >
                        <img src="images/ebook.png" alt="ebook" width="80%"/>
                    </div>
                    <div style="margin-bottom: 50px">
                        <strong style="font-size: 25px; color: #fff;">Ganhe um ebook <span style="color: red">" Totalmente Grátis "</span></strong>
                        <br>
                        <br>
                        <strong style="font-size: 25px; margin-bottom: 50px; color: #fff;">"Resolva em definitivo seus problemas com produtos de divulgação imobiliária "</strong>
                    </div>

                    <form id="main-contact-form" name="contact-form" method="post" action="http://www.casadosbanners.com.br/teste/capturaEmail&a=capturaEmail">

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Digite Seu melhor email">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Quero ter o ebook Agora">
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>     

</section>
<?php

require_once 'site/views/footer.php';
?>
