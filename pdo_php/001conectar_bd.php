<!--
    PDO significa PHP Data Objects, Objetos de Datos de PHP, una extensión para acceder a bases de datos. PDO permite acceder a diferentes sistemas de bases de datos con un controlador específico (MySQL, SQLite, Oracle...) mediante el cual se conecta. Independientemente del sistema utilizado, se emplearán siempre los mismos métodos, lo que hace que cambiar de uno a otro resulte más sencillo.

    El primer argumento de la clase PDO es el DSN, Data Source Name, en el cual se han de especificar el tipo de base de datos (mysql), el host (localhost) y el nombre de la base de datos (se puede especificar también el puerto). Diferentes sistemas de bases de datos tienen distintos métodos para conectarse. La mayoría se conectan de forma parecida a como se conecta a MySQL:
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
            //El primer argumento de la clase PDO es el DSN, Data Source Name, en el cual se han de especificar el tipo de base de datos (mysql), el host (localhost) y el nombre de la base de datos (se puede especificar también el puerto). Diferentes sistemas de bases de datos tienen distintos métodos para conectarse. La mayoría se conectan de forma parecida a como se conecta a MySQL:
            $dbname = "prueba";
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $user = "root";
            $password = "Mysql_66306713333";
            //DBH significa Database Handle, y es el nombre de variable que se suele utilizar para el objeto PDO.
            $dbh = new PDO($dsn, $user, $password);
            echo "Conexión exitosa";
        } catch(PDOException $e){
            echo $e->getMessage();
        }

        $dbh = NULL; //cerramos conexión
    ?>
    <div style="margin-top: 3em;"><a href="./">Volver</a></div>
</body>
</html>