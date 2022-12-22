<?php
include_once 'producto.php';

class ApiProducto {
    private $error;

    function getAll(){
        $producto = new Producto();
        $productos = array();

        $res = $producto->getProductos();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    'id_producto' => $row['id_producto'],
                    'nombre'      => $row['nombre'],
                    'precio'      => $row['precio'],
                );
                array_push($productos, $item);
            }

            echo json_encode(['statuscode' => 200, 'items' => $productos]);
        }else{
            echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud *getAll*']);
        }
    }

    function getById($id){
        $producto = new Producto();
        $productos = array();

        $res = $producto->getProductoById($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();

            $item=array(
                'id_producto' => $row['id_producto'],
                'nombre'      => $row['nombre'],
                'precio'      => $row['precio'],
            );
            array_push($productos, $item);
            echo json_encode(['statuscode' => 200, 'items' => $productos]);
        } else {
            echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud *getById*']);
        }
    }

    function add($item){
        $producto = new Producto();

        $res = $producto->createProducto($item);
        $this->exito("Nuevo producto registrado");
    }

    function update($item){
        $producto = new Producto();

        $res = $producto->updateProducto($item);
        $this->exito("Producto actualizado satisfactoriamente");
    }
    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }

    function getError(){
        return $this->error;
    }
}

