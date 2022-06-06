<?php 

//LLAMAMOS A LAS FUNCIONES DE PHP
require 'funciones_php.php';

//HEADER
require("./header.php")


?>

<!-- ENCABEZADO SECCION-->
<div class="encabezado text-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Pedir Cita</h2>
            </div>
        </div>
    </div>
</div>

<!--SECCION CITA PREVIA-->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titulo-seccion">
                    <h2>Solicitar cita a través de la Web </h2>
                </div>
            <!-- FORMULARIO CITA PREVIA-->
                <div class="contact-info">
                    <form action="formularios.php?cita=yes" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre y Apellidos *</label>
                                <input type="text" class="form-control" name="nombre" required><p></p>
                            </div>
                            <div class="col-md-3">
                                <label>Telefono *</label>
                                <input type="tel" class="form-control" name="tel" pattern="[0-9]{9}" required><p></p>
                            </div>
                            <div class="col-md-3">
                                <label>Correo Electrónico</label>
                                <input type="email" class="form-control" name="email"><p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Servicio *</label>
                                <select class="form-select" name="servicio" required>
                                <?php mostrarServiciosSelect();?>
                                </select><p></p>
                            </div>
                            <div class="col-md-4">
                                <label>Dia *</label>
                                <input type="date" name="dia" class="form-control" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required><p></p>
                            </div>
                            <div class="col-md-4">
                                <label>Horario *</label>
                                <select class="form-select" name="horario">
                                    <option value="mañana">Mañana</option>
                                    <option value="mañana">Tarde</option>
                                </select><p></p>
                            </div>
                        </div>
                        <label>Observaciones </label><p></p>
                        <textarea name="observaciones" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea><p></p>
                        <button class="btn btn-outline-danger" type="submit">Enviar</button>

                    </form>
                </div>
                <!--CITA POR TELEFONO-->
                <div class="titulo-seccion">
                    <h2>Solicitar cita a través de Telefono </h2>
                </div>
                <p class="text-center">Puede contactar con nosotros en el <b><a href="tel:678417099">678 417 099</a></b> o en el <b><a href="tel:925750359">925 750 359</a></b>, muchas gracias</p>
            </div>
            
        </div>
    </div>
</div>




<?php 
//FOOTER
require("./footer.php")

?>