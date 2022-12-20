<?php
include_once 'pedido.php';

class ApiPedido{
    private $error;

    function getAll(){
        $pedido = new Pedido();
        $pedidos = array();

        $res = $pedido->getPedidos();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id" => $row["id_pedido"],
                    "id_cliente" => $row['id_cliente'],
                    "id_producto" => $row['id_producto'],
                    "cantidad" => $row['cantidad'],
                    "subtotal" => $row['subtotal'],
                );
                array_push($pedidos, $item);
            }

            echo json_encode(['statuscode' => 200, 'items' => $pedidos]);
        }else{
            echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud *getAll*']);
        }
    }

    function getById($id){
        $pedido = new Pedido();
        $pedidos = array();

        $res = $pedido->getPedidoById($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();

            $item=array(
                "id" => $row['id_pedido'],
                "id_cliente" => $row['id_cliente'],
                "id_producto" => $row['id_producto'],
                "cantidad" => $row['cantidad'],
                "subtotal" => $row['subtotal'],
            );
            array_push($pedidos, $item);
            echo json_encode(['statuscode' => 200, 'items' => $pedidos]);
        } else {
            echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud *getById*']);
        }
    }

    function getProductoByIdCliente($id){
        $pedido = new Pedido();
        $pedidos = array();

        $res = $pedido->getPedidoProductoByIdCliente($id);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $item = array(
                    "id_pedido" => $row['id_pedido'],
                    "id_cliente" => $row['id_cliente'],
                    "cantidad" => $row['cantidad'],
                    "subtotal" => $row['subtotal'],
                    "id_producto" => $row['id_producto'],
                    "nombre" => $row['nombre'],
                    "precio" => $row['precio'],
                );
                array_push($pedidos, $item);
            }
            echo json_encode(['statuscode' => 200, 'items' => $pedidos]);
        } else {
            echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud *getProductoByIdCliente*']);
        }
    }

    function add($item){
        $pedido = new Pedido();

        $res = $pedido->createPedido($item);
        $this->exito("Nuevo pedido registrado");
    }

    function update($item){
        $pedido = new Pedido();

        $res = $pedido->updatePedido($item);
        $this->exito("Pedido actulizado satisfactoriamente");
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

