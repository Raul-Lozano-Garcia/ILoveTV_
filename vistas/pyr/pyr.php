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

    <!-- PyR -->
    <section id="pyr" class="container px-4">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="text-center fw-bold mb-5 pt-5">Preguntas frecuentes</h1>
                <p class="text-center">¿Tienes algún tipo de duda acerca de nuestro sitio web? Antes de escribirnos siempre puede que encuentres la respuesta aquí.</p>
            </div>
        </div>

        <div class="row">
        <div class="col-md-3 text-center pe-md-5">
                <h3>Enlaces rápidos</h3>
                <ul class="d-inline-block">
                    <li><a href="#que">¿Qué es ILoveTV?</a></li>
                    <li><a href="#seri">Series</a></li>
                    <li><a href="#compa">Dispositivos compatibles</a></li>
                    <li><a href="#pla">Planes y precios</a></li>
                    <li><a href="#emp">¡Empieza!</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <h2 id="que">¿Qué es ILoveTV?</h2>
                <p>ILoveTV es un servicio de streaming que funciona mediante suscripción y permite a sus usuarios ver series y películas sin anuncios a través de cualquier dispositivo conectado a internet.</p>   

                <p>También se pueden descargar series y películas en cualquier dispositivo iOS, Android o Windows 10 y verlas sin necesidad de conexión a internet.</p>

                <p>Si ya tienes una suscripción y te gustaría obtener más información sobre el uso de ILoveTV, visita Primeros pasos con ILoveTV.</p>

                <h2 id="seri">Series</h2>

                <p>El contenido de ILoveTV varía según la región, y puede cambiar con el tiempo. Su oferta incluye una gran variedad de galardonados títulos originales de ILoveTV, series, películas, documentales y mucho más.</p>

                <p>Cuanto más contenido veas, más se ajustarán a tus gustos las recomendaciones de series y películas que te propondrá ILoveTV.</p>

                <h2 id="compa">Dispositivos compatibles</h2>

                <p>Puedes ver ILoveTV a través de cualquier dispositivo conectado a internet que cuente con la aplicación de ILoveTV, como, por ejemplo, Smart TV, consolas de videojuegos, reproductores multimedia, decodificadores, smartphones y tabletas. También puedes ver ILoveTV en tu ordenador, a través de un navegador de internet. Puedes consultar los requisitos del sistema para obtener información sobre la compatibilidad de navegadores web y comprobar nuestras recomendaciones de velocidad de internet para lograr el mejor rendimiento.</p> 

                <p>¿Necesitas ayuda para realizar la configuración? Busca en nuestro Centro de ayuda el fabricante del dispositivo que utilizas.</p>

                <h2 id="pla">Planes y precios</h2>

                <p>En los distintos planes de ILoveTV se determina el número de personas que pueden ver contenido al mismo tiempo y si podrás verlo en definición estándar (SD), en alta definición (HD) o en ultra alta definición (UHD).</p>

                <p>Compara nuestros planes y precios para dar con el que mejor se ajuste a tus necesidades. Puedes cambiar de plan fácilmente o cancelar tu suscripción en línea en cualquier momento.</p>

                <h2 id="emp">¡Empieza!</h2>

                <p>Sigue estos sencillos pasos para comenzar a ver ILoveTV hoy mismo:</p>

                <p>1. Visita ilovetv.es</p>

                <p>2. Elige el plan que más se adapte a ti.</p>

                <p>3. Crea una cuenta introduciendo tu dirección de correo y creando una contraseña.</p>

                <p>4. Introduce un método de pago. Como suscriptor de ILoveTV, se te cobrará una vez al mes en el día en que te suscribiste.</p> 

                <p>Eso es todo. ¡Disfruta de ILoveTV!</p>

            </div>
        </div>
    </section>
    <!-- FIN PyR -->

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