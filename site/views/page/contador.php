
    <?php require_once '//localhost/promocao/views/header.php'; ?>

    <body onload="atualizaContador()">
        <div class="logo-image">                                
            <a href="index.html"><img class="img-responsive" src="//localhost/images/logo.png" alt="Casa dos banners"> </a> 
        </div>
        <section id="coming-soon">        
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">                    
                        <div class="text-center coming-content">
                            <h1>Novos Produtos Casa dos Banners</h1>
                            <p>Não Perca estamos em contagem Regressiva !!</p>                           
                            <div class="social-link">
                                <span><a href="https://www.facebook.com/CasadosBanners/"><i class="fa fa-facebook"></i></a></span>

                            </div>
                        </div>                    
                    </div>
                    <div class="col-sm-12">
                        <div class="time-count">
                            <ul id="countdown">
                                <li class="angle-one">
                                    <span id="dias" class="days time-font">00</span>
                                    <p>Dias</p>
                                </li>
                                <li class="angle-two">
                                    <span id="horas" class="hours time-font">00</span>
                                    <p>Horas</p>
                                </li>
                                <li class="angle-three">
                                    <span id="minut" class="minutes time-font">00</span>
                                    <p class="minute">Min</p>
                                </li>                            
                                <li class="angle-four">
                                    <span id="segundos" class="seconds time-font">00</span>
                                    <p>Seg</p>
                                </li>               
                            </ul>   
                        </div>
                    </div>
                </div>
            </div>       
        </section>
        <section id="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><i class="fa fa-envelope-o"></i> Quer Receber nossa Promoções</h2>
                                <p>Deixe aqui seu email pra recerber promoções e descontos para você e sua empresa.</p>
                            </div>
                            <div class="col-sm-6 newsletter">
                                <form id="newsletter">
                                    <input class="form-control" type="email" name="email"  value="" placeholder="Email">
                                    <i class="fa fa-check"></i>
                                </form>
                                <p>Não se preocupe, não usaremos seu email para spam.</p>
                            </div>    
                        </div>
                    </div>     
                </div>
            </div> 
        </section>

        <section id="coming-soon-footer" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <p>&copy; Casa Dos Banners 2010. Todos os Direitos Reservados.</p>
                        <p>Crafted by <a target="_blank" href="http://criaative.com.br/">criaative</a></p>
                        <!-- <p>&copy; Your Company 2014. All Rights Reserved.</p>
                        <p>Crafted by <a target="_blank" href="http://designscrazed.org/">Allie</a></p> -->
                    </div>
                </div>
            </div>       
        </section>


        <script type="text/javascript">
            var YY = 2007;
            var MM = 12;
            var DD = 31;
            var HH = 23;
            var MI = 59;
            var SS = 59;

            function atualizaContador() {
                var hoje = new Date();
                var futuro = new Date(2017, 11 - 1, 20, 00, 00, 00);

                var ss = parseInt((futuro - hoje) / 1000);
                var mm = parseInt(ss / 60);
                var hh = parseInt(mm / 60);
                var dd = parseInt(hh / 24);

                ss -= (mm * 60);
                mm -= (hh * 60);
                hh -= (dd * 24);

                if (dd + hh + mm + ss > 0) {


                    document.getElementById('dias').innerHTML = dd;
                    document.getElementById('horas').innerHTML = (toString(hh).length) ? hh : '';
                    document.getElementById('minut').innerHTML = (toString(mm).length) ? mm : '';
                    document.getElementById('segundos').innerHTML = ss;
                    setTimeout(atualizaContador, 1000);
                } else {
                    document.getElementById('contador').innerHTML = 'CHEGOU!!!!';
                    setTimeout(atualizaContador, 1000);
                }
            }

        </script>

    </body>
</html>