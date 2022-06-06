<?php 

//HEADER
require("./header.php")

?>
<!-- ENCABEZADO SECCION -->
<div class="encabezado text-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>CONTACTO</h2>
            </div>
        </div>
    </div>
</div>
<!-- MAPA -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title">Ubicación</h2>
                <div class="contact-info">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d760.521183570358!2d-4.363430602059957!3d39.873795316448096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2ses!4v1618578526800!5m2!1ses!2ses"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <h3>Direccion <span>Av. de Talavera, 26 Local 4, 45516 La Puebla de Montalbán, Toledo</span>:</h3>
                </div>
            </div>
            <!-- FORMULARIO CONTACTO -->
            <div class="col-md-12">
                <div class="contact-info">
                    <h2 class="section-title">Contacto</h2>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-5 text-center">
                        <h3>Teléfono <a href="tel:678417099">678 417 099</a> //<a href="tel:925750359"> 925 750 359</a></h3>
                        <h3>Correo Electrónico <a href="mailto:crcvial@gmail.com">crcvial@gmail.com</a></h3>
                        </div>
                        <div class="col-md-7">
                            <form action="formularios.php?contacto=yes" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nombre y Apellidos *</label>
                                        <input type="text" name="nombre" class="form-control" required><p></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Telefono *</label>
                                        <input type="tel" name="tel" class="form-control" pattern="[0-9]{9}" required><p></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo</label>
                                        <input type="email" name="correo" class="form-control"><p></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Mensaje *</label><p></p>
                                        <textarea class="form-control" name="mensaje" id="exampleFormControlTextarea1" rows="2" required></textarea><p></p>
                                    </div>  
                                </div>
                                <button class="btn btn-outline-danger" type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>





<?php 
//FOOTER
require("./footer.php")
?>