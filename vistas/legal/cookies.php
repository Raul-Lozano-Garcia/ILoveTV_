<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILoveTV || La web para los amantes de las series</title>
    <link rel="icon" href="../../assets/imagenes/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <script type="text/javascript" src="../../js/app.js" defer></script>
</head>
<body>

<?php
    require_once("../../php/funciones.php");
    sesionNormal("../..");
    crearHeader("../..");
?>

 <!-- MAIN -->
 <main class="bg-light">

    <!-- POLÍTICA -->
    <section id="textos_legales" class="container p-4">
       <div class="row">
           <div class="col-12">
               <div class="bg-dark text-light p-5 mb-5">
                    <h1 class="text-center">POLÍTICA DE COOKIES</h1>
                    <span class="text-center d-block">www.ilovetv.es</span>
               </div>
               
               <p>
                   El acceso a este Sitio Web puede implicar la utilización de cookies. Las cookies son pequeñas cantidades
                   de información que se almacenan en el navegador utilizado por cada Usuario —en los distintos dispositivos
                   que pueda utilizar para navegar— para que el servidor recuerde cierta información que posteriormente y
                   únicamente el servidor que la implementó leerá. Las cookies facilitan la navegación, la hacen más
                   amigable, y no dañan el dispositivo de navegación.
               </p>
<p>
    Las cookies son procedimientos automáticos de recogida de información relativa a las preferencias
    determinadas por el Usuario durante su visita al Sitio Web con el fin de reconocerlo como Usuario, y
    personalizar su experiencia y el uso del Sitio Web, y pueden también, por ejemplo, ayudar a identificar y
    resolver errores.
</p>
<p>
    La información recabada a través de las cookies puede incluir la fecha y hora de visitas al Sitio Web, las
    páginas visionadas, el tiempo que ha estado en el Sitio Web y los sitios visitados justo antes y después del
    mismo. Sin embargo, ninguna cookie permite que esta misma pueda contactarse con el número de
    teléfono del Usuario o con cualquier otro medio de contacto personal. Ninguna cookie puede extraer
    información del disco duro del Usuario o robar información personal. La única manera de que la
    información privada del Usuario forme parte del archivo Cookie es que el usuario dé personalmente esa
    información al servidor.
</p>
<p>
    Las cookies que permiten identificar a una persona se consideran datos personales. Por tanto, a las
    mismas les será de aplicación la Política de Privacidad anteriormente descrita. En este sentido, para la
    utilización de las mismas será necesario el consentimiento del Usuario. Este consentimiento será
    comunicado, en base a una elección auténtica, ofrecido mediante una decisión afirmativa y positiva, antes
    del tratamiento inicial, removible y documentado.
</p>
<h2>Cookies propias</h2>
<p>
    Son aquellas cookies que son enviadas al ordenador o dispositivo del Usuario y gestionadas
    exclusivamente por Blog de series de televisión para el mejor funcionamiento del Sitio Web. La
    información que se recaba se emplea para mejorar la calidad del Sitio Web y su Contenido y su
    experiencia como Usuario. Estas cookies permiten reconocer al Usuario como visitante recurrente del Sitio
    Web y adaptar el contenido para ofrecerle contenidos que se ajusten a sus preferencias.
</p>
<h2>Deshabilitar, rechazar y eliminar cookies</h2>
<p>
    El Usuario puede deshabilitar, rechazar y eliminar las cookies —total o parcialmente— instaladas en su
    dispositivo mediante la configuración de su navegador (entre los que se encuentran, por ejemplo, Chrome,
    Firefox, Safari, Explorer). En este sentido, los procedimientos para rechazar y eliminar las cookies pueden
    diferir de un navegador de Internet a otro. En consecuencia, el Usuario debe acudir a las instrucciones
    facilitadas por el propio navegador de Internet que esté utilizando. En el supuesto de que rechace el uso
    de cookies —total o parcialmente— podrá seguir usando el Sitio Web, si bien podrá tener limitada la
    utilización de algunas de las prestaciones del mismo.
</p>
<p>
    Este documento de Política de Cookies ha sido creado mediante el generador de plantilla de política de
    cookies online el día 17/02/2022.
</p>
           </div>
       </div>

       <div class="row p-3">
           <div class="col-12">
               <small class="text-center d-block">Si lo desea, puede descargar toda esta documentación en formato PDF pinchando <a href="../../assets/legal/politicaCookies.pdf" download="Política cookies ILoveTV.pdf">aquí</a>
</small>
           </div>
       </div>
    </section>
    <!-- FIN POLÍTICA -->

    <!-- MODAL COOKIES -->
    <div class="cookie-consent-modal">
        <div class="content">
            <h2>Permitir cookies</h2>
            <p>Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información <a href="../../vistas/legal/cookies.php">aquí</a></p>
            <div class="btns">
                <button class="btn cancel">Cancelar</button>
                <button class="btn accept">Aceptar</button>
            </div>
        </div>
    </div>

</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>