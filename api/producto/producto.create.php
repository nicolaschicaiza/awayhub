<?php

function write_to_console($data) {
 $console = $data;
 if (is_array($console))
 $console = implode(',', $console);

 echo "<script>console.log('Console: " . $console . "' );</script>";
}


?>
<?php
include_once 'producto.api.php';

$response = json_decode(file_get_contents('http://localhost/awayhub/api/producto/producto.read.php'), true);

$api = new ApiProducto();
//$id_producto = $_REQUEST['id_producto'];
$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$nuevo = false;
$error = '';
$item = array();
write_to_console("estoy aqui");
if(isset($nombre)){
    foreach($response['items'] as $producto){
        write_to_console("entre al for");        
            if($producto['nombre'] == $nombre){
                $item = array(
                    "nombre" => $producto['nombre'],
                    "precio" => $producto['precio']
                );
                $nuevo = false;
                
                break;
            }else{
                $nuevo = true;
            }
        
    }

    if($nuevo){
        write_to_console("entre a nuevo");
        $item = array(
            "nombre" => $nombre,
            "precio" => $precio
        );
       
        $api->add($item);
       
    }else{
        $api->update($item);
    }
    $_SESSION['message'] = 'PRODUCTO CREADO';
    $_SESSION['message_type'] = 'success';
    $_SESSION['id'] = $_SESSION['id'];
    header('Location:../../pages/home.php', '');
}else{
    $api->error('Error al llamar la API');
}
