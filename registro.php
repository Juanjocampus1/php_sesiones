<html>
    <body>
        <form method="post" action="<?PHP $_SERVER['PHP_SELF']?>">
            <input type="text" name="nombre" placeholder="nombre de la asignatura">
            <input type="number" name="creditos" placeholder="numero de creditos">
            <input type="date" name="fecha">
            <input type="submit" name="enviar">
        </form>
        <?PHP
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $nombre = $_POST['nombre'];
                $creditos = $_POST['creditos'];
                $fecha = $_POST['fecha'];
                $conexion = new mysqli("localhost", "root", "", "test");

                $insertar = "INSERT INTO TEST.ASIGNATURAS (ID, NOMBRE, CREDITOS, FECHA_INICIO) VALUES(null, '$nombre', '$creditos', '$fecha')";
                $conexion ->query($insertar);
                $cosultar = "select * from test.asignaturas";
                $resultado = $conexion ->query($cosultar);

                echo '<table border="1">';
                while ($fila = $resultado -> fetch_assoc()){

                    echo '<tr>';
                    echo '<td>'.$fila['id'].'<td>';
                    echo '<td>'.$fila['nombre'].'<td>';
                    echo '<td>'.$fila['creditos'].'<td>';
                    echo '<td>'.$fila['fecha_inicio'].'<td>';
                    echo '</tr>';

                }
                echo '</table>';
            }
        ?>
    </body>
</html>