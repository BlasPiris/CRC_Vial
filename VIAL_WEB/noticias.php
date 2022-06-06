<?php 

//LLAMAMOS A LAS FUNCIONES DE PHP
require 'funciones_php.php';

//HEADER
require("./header.php")


?>
    <!--ENCABEZADO SECCION-->
       <div class="encabezado text-white">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Últimas Noticias</h2>
                    </div>
                </div>
            </div>
        </div>

 <!--NOTICIAS SECCION-->
        <div class="wrapper news">
           <?php mostrarNoticias(); ?>
        </div>
        <?php 
//FOOTER
require("./footer.php");

?>

            