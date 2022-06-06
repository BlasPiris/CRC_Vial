<?php 

//LLAMAMOS A LAS FUNCIONES DE PHP
require 'funciones_php.php';

//HEADER
require("./header.php")
?>
            <!-- SECCION PRINCIPAL -->
            <div class="faqs">
                <div class="container-fluid">
                    <div class="row align-items-center m-3">
                        <div class="col-md-6">
                            <h2>Centro Médico <span>VIAL</span></h2>
                            
                            <p>Centro de reconocimento de conductores y especialidades médicas</p>
                            
                        </div>
                        <div class="col-md-6">
                            <img src="img/DSC_2213.jpg" class="border" alt="Image">
                        </div>
                    </div>
                </div>
            </div> 
            <hr>
            <!-- SECCION SERVICIOS -->
                    <?php mostrarServiciosIndex(); ?>
            <hr>       
            <!-- ULTIMAS NOTICIAS -->
         <?php ultimaNoticiaIndex(); ?>
         <hr>


            <!-- PREGUNTAS FRECUENTES -->
            <div class="faqs">
                <div class="container-fluid">
                    <div class="row align-items-center m-3">
                        <div class="col-md-6">
                            <h2 class="section-title">Preguntas Frecuentes</h2>
                            <div id="accordion">
                                <div class="card" style="display:none;">
                                    
                                </div>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" href="#uno">
                                        
                                        <a class="card-link" >
                                          ¿PUEDO RENOVAR MI CARNÉ DE CONDUCIR ANTES DE QUE ME CADUQUE?
                                        </a>
                                        <i class="fas fa-chevron-down"></i>

                                    </div>
                                    <div id="uno" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                        Puedes hacerlo hasta tres meses antes sin perder tiempo de vigencia. Adelantar la renovación no supone que pierdas días de 
                                        validez ya que la prórroga de tu permiso empieza a contar desde la fecha en que caducara el antiguo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" href="#dos">
                                        
                                        <a class="card-link" >
                                          ¿QUÉ DEBO LLEVAR PARA RENOVAR MI CARNÉ DE CONDUCIR?
                                        </a>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="dos" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                        Para la renovación del carnet de conducir será necesario traer:</p>
                                        <b>•	Carnet de conducir<br>
                                        •	DNI o tarjeta de residencia en vigor</p></b>
                                        Si utiliza gafas, lentes de contacto o audífonos, le recomendamos que se las traiga para su revisión médica.

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" href="#tres">
                                        <a class="card-link" >
                                          ¿PUEDO LLEVAR A CABO EL CANJE DE MI CARNÉ DE CONDUCIR?
                                        </a>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="tres" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                        Previamente deberá solicitar cita en la Dirección General de Tráfico (DGT). Para el canje del carnet de conducir será 
                                         traer:</p>
                                         <b>•  NIE del titular<br>
                                         •  Carnet de conducir original</p></b>
                                        Le haremos entrega del Certificado Psicotécnico que deberá entregar en su cita en la Jefatura de Tráfico correspondiente. 
                                        La DGT le enviará su carnet de conducir original a su domicilio.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="img/DSC_1805.JPG" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
<?php 
//FOOTER
require("./footer.php");

?>
            



