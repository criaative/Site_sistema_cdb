<!--acrescente na sua pagina principal substitua 3700 pelo tento que quiser em segundos-->
<?php
/*
  include 'contador.php';
  if (isset($_COOKIE['counte'])) {
  $counte = $_COOKIE['counte'] + 1;
  } else {
  $counte = 1;
  $a++;
  }
  setcookie('counte', "$counte", time() + 3700);
  $abre = @fopen("contador.php", "w");
  $ss = '<?php $a=' . $a . '; ?>';
  $escreve = fwrite($abre, $ss);
  ?>

  <!--e coloque onde você quiser que que exiba o contador, personalize do jeito que quiser-->

  <?php
  echo "<br>$a Pessoas vizitaram esse site voce ja vitou $counte vezes";
 */

require_once 'site/views/header.php';

require_once 'site/views/menu.php';

require_once 'site/promocao/views/page/banners.php';

require_once 'site/views/page/servicos.php';

require_once 'site/views/page/conteudos.php';

require_once 'site/views/page/clientes.php';

require_once 'site/promocao/views/page/contador.php';


//require_once 'site/views/page/valores.php';
require_once 'site/views/footer.php';
?>
<script>

    $(document).ready(function () {
        $('#exampleModalLong').modal('show');
    })


</script>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ficha de Cadastro</h2>
            </div>
            <div class="modal-body">
                <div class="col-md-8 col-sm-12">
                    <span>Deixe seu email aqui!</span>

                </div>
                <form id="main-contact-form" name="contact-form" method="post" action="http://www.casadosbanners.com.br/teste/capturaEmail&a=capturaEmail">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                    </div>
                </form>
                <div class="col-md-3" >
                    <img src="images/ebook.png" alt="ebook" width="80%"/>
                </div>
                <div>
                    <h2><strong>Ganhe um ebook <span style="color: red">" Totalmente Grátis "</span></strong></h2>
                    <p style=" font-size: 15px; padding: 12px;">"Resolva em definitivo seus problemas com produtos de divulgação imobiliária "</p>
                </div>

            </div>

            <div class="modal-footer">
                <p style="text-align: left; font-size: 12px;">Casa dos Banners<br>
                    <!--Razão Social: CDB HENRIQUE BARBOSA NEVES ATHAYDES - ME <br>-->
                    cnpj: 25.000.634/0001-75</p>
            </div>
        </div>
    </div>
</div>

