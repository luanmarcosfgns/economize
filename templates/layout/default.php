<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Economize$$';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <script data-ad-client="ca-pub-3620011549108197" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
   
</head>
<body>
    <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Econmize</span>$$</a>
        </div>
        <div class="top-nav-links" style="display: <?= strripos($_SERVER["REQUEST_URI"],'index' )==false?'none':'inline-block'?>" >
            <input type="text" class="input-search" alt="tabela" placeholder="Buscar nesta lista" />
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <div> 

            </div>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <div>
	<script data-ad-client="ca-pub-3620011549108197" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </div>
 <?= $this->Html->script(['jquery.min','print.min']) ?>   

 <?= $this->fetch('script') ?>
 
 <script>
     $(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});
 </script>
 


<script type="text/javascript">
    
$(function(){
    $(".input-search").keyup(function(){
        //pega o css da tabela 
        var tabela = $(this).attr('alt');
        if( $(this).val() != ""){
            $("."+tabela+" tbody>tr").hide();
            $("."+tabela+" td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        } else{
            $("."+tabela+" tbody>tr").show();
        }
    }); 
});
$.extend($.expr[":"], {
    "contains-ci": function(elem, i, match, array) {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});
<?php 

$link=explode('/',$_SERVER["REQUEST_URI"]);
$mercado_id= empty($link[4])?'':$link[4];

?>

</script>
<script>
    $('.filtrolista').change(function(){
        var link= $('.filtrolista').val();
       $(location).attr('href', 'http://economize.computark.fun/economize/precos/index/<?=!empty($mercado_id)?$mercado_id."/'":''?>+link); 
    });
    
</script>
<script>

   $(window).on("load",function(){
 var url_atual = window.location.href;
 var mercado_id= url_atual.split('/');
  $('.filtrolista').val( mercado_id[7]);

   
});
    
</script>
<script>

       
$('.compartilhar').on('click',function(){
    
    html2canvas(document.querySelector("#capture")).then(canvas => {
   
    image = canvas.toDataURL("image/png", 1.0).replace("image/png", "image/octet-stream");
  var link = document.createElement('a');
  link.download = "my-image.png";
  link.href = image;
  link.click();
    
});


  
});
    
</script>




</body>
</html>
