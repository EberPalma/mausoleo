@extends('layouts.invitado.invitadomenu')

@section('header')
<div>
    <img src="{{ asset('img/Logohc.png') }}" alt="..." width="200" >
  <nav class="nav nav-masthead justify-content-center float-md-end">
    <a class="nav-link"  href="#">Inicio</a>
    <a class="nav-link" href="#">Condolencias</a>
    <a class="nav-link" href="#">Presentacion</a>
    <a class="nav-link active" aria-current="page" href="#">Contacto</a>&nbsp&nbsp&nbsp
    <li class="nav-item dropdown show">
      <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Recordando a</a>
      <div id="dropdownf" class="dropdown-menu show" aria-labelledby="dropdown07">
        <a class="dropdown-item" href="#hoy">Hoy</a>
        <a class="dropdown-item" href="#mes">Mes</a>
      </div>
    </li>
  </nav>
</div>
@endsection
@section('body')
<style>
    
    @media screen and (max-width: 1008px) {
        .smartcard{
        width: 23rem;
    }
    
}
    @media screen and (min-width: 1008px) {
        .smartcard{
        width: 40rem;
    }
    
}
</style><br>
<center>
    <div class="card text-white bg-secondary mb-3 smartcard" >
        <img src="{{ asset('img/1.jpg') }}" class="card-img-top" height="250px" alt="...">
        <div class="card-body">
          <h5 class="card-title">Contacto</h5>
          <p class="card-text">Horario: Lunes a Viernes de 10:00 a 18:00 hrs. Sábado y Domingo de 10:00 a 14:00 hrs. Para mayores informes comuníquese con nosotros o envíenos sus comentarios.</p>
        </div><hr>
        <div class="card-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre">
                  </div>
                </div><hr>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa-solid fa-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Telefono">
                      </div>
                  </div><hr>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Correo Electronico">
                      </div>
                  </div><hr>
                  <label for="exampleInputEmail1">Asunto</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                    <label class="form-check-label" for="flexRadioDefault1"> Informes </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"/>
                    <label class="form-check-label" for="flexRadioDefault2"> Sugerencias </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"/>
                    <label class="form-check-label" for="flexRadioDefault3"> Quejas </label>
                  </div><hr>
                  
                  
              </form>
              <div class="g-recaptcha" data-sitekey="your_site_key"></div>
          </div><hr>
        <div class="card-body">
          <a class="btn btn-danger" style="float:left;" href="#" class="card-link"><i class="fa-solid fa-backward"></i>  &nbsp <b>Regresar</b></a>
          <a class="btn btn-success" style="float:right;" href="#" class="card-link"><b>Enviar</b> &nbsp <i class="fa-solid fa-paper-plane"></i></a>
        </div>
        
      </div>
      
      

<div  class="mx-auto">
<div class="card text-black bg-primary smartcard" >
  
  <div  aria-expanded="true" style="text-align: center;"><br>
    <h5 class="card-title"><a id="collapseAviso" style="color:white; cursor: pointer;">Aviso de Privacidad  &nbsp <i class="fa-solid fa-circle-chevron-down"></i></a></h5>
    <div class="card-body" id="txtavisoprivacidad">
        <p class="text-justify">De acuerdo a lo previsto en la&nbsp;<strong>"LEY FEDERAL de Protección de Datos Personales"&nbsp;</strong>Mausomex, S.A. de C.V. declara ser una empresa legalmente constituida de conformidad con las leyes mexicanas, con domicilio ubicado en, Jardín 5 de Mayo No. 103, Col. Santa Clara, Toluca, Estado de México C.P. 50090 así como manifestar ser la responsable del tratamiento de sus datos personales.</p>
        <p class="text-justify">Oficina de privacidad ubicada en: Mismo domicilio.</p>
        <p class="text-justify">Teléfonos de la oficina de privacidad: 722 215 5545.</p>
        <p class="text-justify">Correo electrónico: mausoleosantaclara@gmail.com.</p>
        <p class="text-justify"><strong>DEFINICIONES:</strong></p>
        <p class="text-justify"><strong>Datos personales.-</strong> Cualquier información concerniente a una persona física identificada o identificable.</p>
        <p class="text-justify"><strong>Titular.-</strong> La persona física (TITULAR) a quien identifica o corresponden los datos personales.</p>
        <p class="text-justify"><strong>Responsable.-</strong> Persona física o moral de carácter privado que decide sobre el tratamiento de los datos personales.</p>
        <p class="text-justify"><strong>Tratamiento.-</strong> La obtención, uso (que incluye el acceso, manejo, aprovechamiento, transferencia o disposición de datos personales), divulgación o almacenamiento de datos personales por cualquier medio.</p>
        <p class="text-justify"><strong>Transferencia.-</strong> Toda comunicación de datos realizada a persona distinta del responsable o encargado del tratamiento.</p>
        <p class="text-justify"><strong>Derechos ARCO.-</strong> Derechos de acceso, rectificación, cancelación y oposición.</p>
        <p class="text-justify"><strong>Consentimiento Tácito.-</strong> Se entenderá que el titular ha consentido en el tratamiento de los datos, cuando habiéndose puesto a su disposición el Aviso de Privacidad, no manifieste su oposición.</p>
        <p class="text-justify"><strong>FINES DE LA INFORMACIÓN.- </strong>Sus datos personales serán utilizados para los siguientes fines:</p>
        <p class="text-justify">Fines económicos., Fines laborales., Fines de marketing.</p>
        <p class="text-justify"><strong>FORMAS DE RECABAR SUS DATOS PERSONALES.- </strong>Para las actividades señaladas en el presente aviso de privacidad, podemos recabar sus datos personales de distintas formas cuando usted nos los proporciona directamente; cuando visita nuestro sitio de Internet o utiliza nuestros servicios en línea, y cuando obtenemos información a través de otras fuentes que están permitidas por la ley.</p>
        <p class="text-justify"><strong>DATOS PERSONALES QUE SE RECABAN DE FORMA DIRECTA</strong></p>
        <p class="text-justify"><strong>RECABAMOS SUS DATOS PERSONALES DE FORMA DIRECTA CUANDO USTED MISMO NOS PROPORCIONA POR DIVERSOS MEDIOS</strong></p>
        <p class="text-justify">Tales como:</p>
        <ul>
            <li class="text-justify">Correo electrónico</li>
            <li class="text-justify">Nombre completo</li>
            <li class="text-justify">Nombre del cónyuge</li>
            <li class="text-justify">Teléfono</li>
            <li class="text-justify">Teléfono móvil</li>
            <li class="text-justify">Domicilio</li>
            <li class="text-justify">Hijos</li>
            <li class="text-justify">RFC</li>
            <li class="text-justify">Difuntos</li>
        </ul>
        <p class="text-justify"><strong>DATOS PERSONALES QUE RECABAMOS CUANDO VISITA NUESTRO SITIO DE INTERNET O UTILIZA NUESTROS SERVICIOS EN LINEA</strong></p>
        <p class="text-justify">Tales como:</p>
        <ul>
            <li class="text-justify">Correo electrónico</li>
            <li class="text-justify">Nombre completo</li>
            <li class="text-justify">Teléfono</li>
            <li class="text-justify">Teléfono móvil</li>
        </ul>
        <p class="text-justify"><strong>DATOS PERSONALES QUE RECABAMOS A TRAVÉS DE OTRAS FUENTES PERMITIDAS POR LA LEY</strong></p>
        <p class="text-justify">Tales como:</p>
        <ul>
            <li class="text-justify">Correo electrónico</li>
            <li class="text-justify">Nombre completo</li>
            <li class="text-justify">Teléfono</li>
            <li class="text-justify">Teléfono móvil</li>
            <li class="text-justify">Domicilio</li>
        </ul>
        <p class="text-justify"><strong>USO DE DATOS SENSIBLES.-</strong> Se consideran datos sensibles aquellos afecten a la esfera más íntima de su titular, o cuya utilización indebida pueda dar origen a discriminación o conlleve un riesgo grave para éste.</p>
        <p class="text-justify">Le informamos que para cumplir con las finalidades previstas en este aviso de privacidad, serán recabados y tratados datos personales sensibles, como aquéllos que refieren a:</p>
        <ul>
            <li class="text-justify">Creencias religiosas, filosóficas y morales</li>
            <li class="text-justify">Acta de Defunción</li>
        </ul>
        <p class="text-justify">Nos comprometemos a que los mismos serán tratados bajo las más estrictas medidas de seguridad que garanticen su confidencialidad.</p>
        <p class="text-justify">De conformidad con lo que establece el artículo 9 de la Ley en cita, requerimos de su consentimiento expreso para el tratamiento de sus datos personales sensibles, por lo que le solicitamos indique que si acepta el tratamiento:</p>
        <ul>
            <li>Sí consiento que mis datos personales sensibles sean tratados conforme a los términos y condiciones del presente aviso de privacidad.</li>
        </ul>
        <p class="text-justify">_______________________________________________ Nombre y firma del Titular.</p>
        <p class="text-justify"><strong>LIMITACIÓN O DIVULGACIÓN DE SUS DATOS PERSONALES.- </strong>El responsable de la información se compromete a realizar únicamente las siguientes acciones, respecto a su información:</p>
        <p class="text-justify">Envió de mensajes SMS, Envió de correo postal publicitario, Realizar llamadas telefónicas, Envió de correos electrónicos</p>
        <p class="text-justify"><strong>PROCEDIMIENTO PARA HACER VALER LOS DERECHOS ARCO.-</strong> Usted tiene derecho de acceder a sus datos personales que poseemos y a los detalles del tratamiento de los mismos, así como a rectificarlos en caso de ser inexactos o incompletos; cancelarlos cuando considere que no se requieren para alguna de las finalidades señalados en el presente aviso de privacidad, estén siendo utilizados para finalidades no consentidas o haya finalizado la relación contractual o de servicio, o bien, oponerse al tratamiento de los mismos para fines específicos.</p>
        <p class="text-justify">Los mecanismos que se han implementado para el ejercicio de dichos derechos, los cuales se conocen como derechos Arco mismos que se refieren a la rectificación, cancelación y oposición del Titular respecto al tratamiento de sus datos personales;</p>
        <p class="text-justify"><strong>1)</strong> El procedimiento inicia con la presentación de la solicitud respectiva a los derechos Arco, en el domicilio de nuestra Oficina de Privacidad, mismo que fue debidamente señalado al principio del presente aviso de privacidad.</p>
        <p class="text-justify"><strong>2)</strong> Su solicitud deberá contener la siguiente información:</p>
        <p class="text-justify">Nombre del titular de los datos personales., Domicilio o cualquier otro medio de contacto., Documentos que acrediten su personalidad e identidad., La descripción clara y precisa de los datos personales., Cualquier otro documento que facilite la localización de los datos.</p>
        <p class="text-justify"><strong>3)</strong> El plazo para atender su solicitud es el siguiente: 20 días.</p>
        <p class="text-justify"><strong>TRANSMISION DE SUS DATOS PERSONALES.-</strong> Sus datos personales no pueden ser transferidos dentro y fuera del país, ni tratados por personas externas a esta empresa.</p>
        <p class="text-justify">Nos comprometemos a no transferir su información personal a terceros sin su consentimiento, salvo las excepciones previstas en el artículo 37 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, así como a realizar esta transferencia en los términos que fija esa ley.</p>
        <p class="text-justify"><strong>MODIFICACIONES AL AVISO DE PRIVACIDAD.-</strong> Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas, políticas internas o nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos.</p>
        <p class="text-justify">Por lo que se obliga a mantener actualizado el presente aviso, para su consulta. Esto con el fin de que “EL TITULAR” se encuentre en posibilidad de ejercer sus derechos ARCO y de esta forma mantenerlo al tanto de cualquier modificación mediante aviso al último correo electrónico que nos haya proporcionado.</p>
        <p class="text-justify"><strong>USO DE COOKIES.-</strong> En el presente aviso de privacidad se omitirá el uso de cookies, para recabar información sobres usted.</p>
        <p class="text-justify"><strong>USO DE WEB BEACONS.-</strong> En el presente aviso de privacidad se omitirá el uso de web beacons, para recabar información sobres usted.</p>
        <p class="text-justify">Las partes expresan que el presente aviso, se regirá por las disposiciones legales aplicables en el Estado de México en especial, por lo dispuesto en la Ley Federal de Protección de Datos Personales.</p>
        <p class="text-justify">Si usted considera que su derecho de protección de datos personales ha sido lesionado por alguna conducta de nuestros empleados o de nuestras actuaciones o respuestas, presume que en el tratamiento de sus datos personales existe alguna violación a las disposiciones previstas en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, podrá interponer la queja o denuncia correspondiente ante el IFAI.</p>
        <p class="text-right"><strong>Fecha última actualización 25 de Junio de 2013.</strong></p>
    </div>
</div>
</div>
</div>
</center>
<script>
  
  $(document).ready(function(){
    // Mostrar drwopdown por unos segundos
    $("#dropdownf").hide();
    
    var showed=0;
    $("#dropdown07").click(function(){
    $('#dropdownf').toggle();
    })
    // Aviso de privacidad
    $("#txtavisoprivacidad").hide();
    $("#collapseAviso").click(function(){
        $('#txtavisoprivacidad').toggle();
    })
    

  });
  </script>
@endsection

