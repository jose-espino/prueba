<!--
    PDO maneja los errores en forma de excepciones, por lo que la conexión siempre ha de ir encerrada en un bloque try/catch. Se puede (y se debe) especificar el modo de error estableciendo el atributo error mode:

        $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_SILENT);
        $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_WARNING);
        $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    No importa el modo de error, si existe un fallo en la conexión siempre producirá una excepción, por eso siempre se conecta con try/catch.

        PDO::ERRMODE_SILENT. Es el modo de error por defecto. Si se deja así habrá que comprobar los errores de forma parecida a como se hace con mysqli. Se tendrían que emplear PDO::errorCode() y PDO::errorInfo() o su versión en PDOStatement PDOStatement::errorCode() y PDOStatement::errorInfo().
        PDO::ERRMODE_WARNING. Además de establecer el código de error, PDO emitirá un mensaje E_WARNING. Modo empleado para depurar o hacer pruebas para ver errores sin interrumpir el flujo de la aplicación.
        PDO::ERRMODE_EXCEPTION. Además de establecer el código de error, PDO lanzará una excepción PDOException y establecerá sus propiedades para luego poder reflejar el error y su información. Este modo se emplea en la mayoría de situaciones, ya que permite manejar los errores y a la vez esconder datos que podrían ayudar a alguien a atacar tu aplicación.
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejemplo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    
    <?php
        //El modo de error se puede aplicar con el método PDO::setAttribute o mediante un array de opciones al instanciar PDO:

        //Con un array de opciones
        try{
            $dbname = "prueba";
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $user = "root";
            $password = "Mysql_66306713333";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            );
            $dbh = new PDO($dsn, $user, $password);
            echo "Conexión exitosa<br>";
        } catch(PDOException $e){
            echo $e->getMessage();
        }

        //Con el método PDO::setAttribute   
        try{
            $dbname = "prueba";
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $user = "root";
            $password = "Mysql_66306713333";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        } catch(PDOException $e){
            echo $e->getMessage();
        }

    ?>

    <!--
        Existen más opciones aparte de el modo de error ATTR_ERRMODE, algunas de ellas son:

        ATTR_CASE. Fuerza a los nombres de las columnas a mayúsculas o minúsculas (CASE_LOWER, CASE_UPPER).
        ATTR_TIMEOUT. Especifica el tiempo de espera en segundos.
        ATTR_STRINGIFY_FETCHES. Convierte los valores numéricos en cadenas.
    -->
    <div style="margin-top: 3em;"><a href="./">Volver</a></div>
</body>
</html>