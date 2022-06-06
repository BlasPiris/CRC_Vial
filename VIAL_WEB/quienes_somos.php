<?php 

//LLAMAMOS A LAS FUNCIONES DE PHP
require 'funciones_php.php';

//HEADER
require("./header.php")


?>

            <!-- ENCABEZADO SECCION -->
            <div class="encabezado">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Quiénes Somos</h2>
                        </div>
                    </div>
                </div>
            </div>
            


           <!-- INFO VIAL -->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            
                            
                            <p>
                            Centro Médico VIAL es centro de reconocimiento de conductores y especialidades médicas ubicado en La Puebla 
                            de Montalbán, Toledo. Se caracteriza por prestar una variada seleccion de servicios para atender las necesidades
                            de nuestros clientes.
                            </p>
                            
                        </div>
                    </div>
                    <!-- EMPLEADOS -->
                    <div class="row profesionales">
                        <div class="col-12">
                            <h2 class="section-title">NUESTROS PROFESIONALES</h2>
                        <div class="row">
                       <?php mostrarProfesionales(); ?>
                        </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            

            <?php 
//FOOTER
require("./footer.php");

?>
    
