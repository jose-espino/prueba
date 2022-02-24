<!--
    La clase PDOStatement es la que trata las sentencias SQL. Una instancia de PDOStatement se crea cuando se llama a PDO->prepare(), y con ese objeto creado se llama a métodos como bindParam() para pasar valores o execute() para ejecutar sentencias. PDO facilita el uso de sentencias preparadas en PHP, que mejoran el rendimiento y la seguridad de la aplicación. Cuando se obtienen, insertan o actualizan datos, el esquema es: PREPARE -> [BIND] -> EXECUTE. Se pueden indicar los parámetros en la sentencia con un interrogante "?" o mediante un nombre específico.
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
        try{
            $dbname = "prueba";
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $user = "root";
            $password = "Mysql_66306713333";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            );
            $conexion = new PDO($dsn, $user, $password);
            echo "Conexión exitosa<br>";
        } catch(PDOException $e){
            echo $e->getMessage();
        }

        //bind usando interrogantes
        //Prepare
        $qry = "INSERT INTO tabla VALUES(?, ?)";
        $stmt = $conexion->prepare($qry);
        //Bind
        $id = 1;
        $nombre = "Francisco";
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $nombre);
        //Execute
        $stmt->execute();
        //Bind
        $id = 2;
        $nombre = "Martha";
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $nombre);
        //Execute
        $stmt->execute();
        //Bind
        $id = 3;
        $nombre = "Sofía";
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $nombre);
        //Execute
        $stmt->execute();

        //bind usando variables
        //Prepare
        $qry = "INSERT INTO tabla VALUES(:id, :nombre)";
        $stmt = $conexion->prepare($qry);
        //Bind
        $id = 4;
        $nombre = "Alma";
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        //Execute
        $stmt->execute();
        //Bind
        $id = 5;
        $nombre = "Rodrigo";
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        //Execute
        $stmt->execute();
        //Bind
        $id = 6;
        $nombre = "Luisa";
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        //Execute
        $stmt->execute();

        $conexion = NULL; 




    ?>

    <div style="margin-top: 3em;"><a href="./">Volver</a></div>
</body>
</html>