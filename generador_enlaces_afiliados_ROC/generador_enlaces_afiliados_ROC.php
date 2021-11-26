<?php
/**
 * Plugin Name:  Generador URL Amazon ROC
 * Description:  Generador de URL para realizar compras con el tag de afiliados del ROC de Amazon. Hay que utilizar el shortcode [ROC_afiliados] para que el formulario aparezca en la página o el post que desees.
 * Version:      0.1
 * Author:       Minetas
 * Author URI:   https://www.racingonlineclub.com/
 */


add_shortcode('ROC_afiliados', 'generador_url_amazon');

function generador_url_amazon(){
    
  // Carga la hoja de estilos 
  wp_enqueue_style('css_formulario', plugins_url('style.css', __FILE__));
  ob_start();
  ?>

  <form action="<?php get_the_permalink();?>" method="post" id="form_ROC" class="generador">
      <div class="form-input">
          <label for="titulo">Insertar URL:</label>
          <input type="text" name="url" id="url" required>
      </div>
      <div class="generar-url">
          <input class="boton-generar" type="submit" value="GENERAR URL">
      </div><br>
  </form>

  <?php
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
  } else {
    $url = "";
  }

  if ($url != '') {
    //Tag de afiliado de Amazon del ROC
    $tag="&tag=roc0ce-21";
    ?>

    <script>
    function copyToClipboard(elemento) {
      var $temp = $("<input>")
      $("body").append($temp);
      $temp.val($(elemento).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="copiar-url">
      <label for="url-afiliado">Aquí tienes tu URL de afiliado de Amazon del ROC:</label>

      <div class="boton-copiar-url">
        <button class="boton-copiar" onclick="copyToClipboard('#url_ROC')">COPIAR URL</button>
      </div>

      <div class="url-mostrada">
        <p id="url_ROC"><?php echo $url.$tag; ?></p>
      </div>

    </div>

    <?php
  } 
    return ob_get_clean();
}

