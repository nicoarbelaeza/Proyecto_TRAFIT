<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_productos = (isset($_POST['id_productos'])) ? $_POST['id_productos'] : "";
$nom_pro = (isset($_POST['nom_pro'])) ? $_POST['nom_pro'] : "";
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";





$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionProductos = $conn->prepare(
                "INSERT INTO productos ( nom_pro, precio ) 
                VALUES ('$nom_pro','$precio')"
             );



        $insercionProductos->execute();
        $conn->close();

        header('location: index.php');



        break;


    case 'btnEliminar':
        

        $eliminarProductos = $conn->prepare(" DELETE FROM productos
        WHERE id_productos = '$id_productos' ");

        // $consultaFoto->execute();
        $eliminarProductos->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    
}



/* Consultamos todas los productos */
$consultaProductos = $conn->prepare("SELECT * FROM productos");
$consultaProductos->execute();
$listaProductos = $consultaProductos->get_result();



//Al final de todas las consultas se cierra la conexion
$conn->close();

