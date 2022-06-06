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
                            <h2>Nuestros servicios</h2>
                        </div>
                        <div class="col-12">
                            <p>Ofrecemos a nuestros clientes una gran variedad de servicios</p> 
                        </div>
                    </div>
                </div>
            </div>

        <!-- SECCION SERVICIOS-->
        <div class="wrapper">
           <?php mostrarServicios(); ?>
        </div>
        <?php 
//FOOTER
require("./footer.php");

?>

            