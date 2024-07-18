<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    

    // Creamos un arreglo asociativo para el producto
    $productoNuevo = array(
        'producto' => $producto,
        'cantidad' => $cantidad,
        'precio' => $precio
    );

    

    // Agregamos el producto al carrito (arreglo de objetos en sesión)
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    array_push($_SESSION['carrito'], $productoNuevo);

    // Redirigir a la página del carrito
    header("Location: carrito.php");
    exit();
}
?>

<!-- carrito.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        table {
            
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 15px;
            min-width: 100px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table thead tr {
            background-color: #ffcccb;
            text-align: left;
            font-weight: bold;
        }

        table th, table td {
            padding: 10px 13px;
        }

        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        table tbody tr:last-of-type {
            border-bottom: 2px solid #ffcccb;
        }

        table tbody tr:hover {
            background-color: #f3f3f3;
        }

        table th {
            border: none;
        }
        </style>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <ul>
        <?php
        

        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            echo '<table border="1">';
            echo '<thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                </thead>';
            

            foreach ($_SESSION['carrito'] as $producto) {
                // Verificar que el producto sea un array antes de mostrarlo
                if (is_array($producto) && isset($producto['producto']) && isset($producto['cantidad']) && isset($producto['precio'])) {
                    $cantidad = (int)$producto['cantidad'];
                    $precio = (float)$producto['precio'];
                    $total = $cantidad * $precio;
                    
                    echo '<tr>';
                    echo '<td>' . $producto['producto'] . '</td>';
                    echo '<td>' . $producto['cantidad'] . '</td>';
                    echo '<td>$' . $producto['precio'] . '</td>';
                    echo '<td>$' . $total . '</td>';
                    echo '</tr>';
                } 
            }
        }else {
            echo '<li>No hay productos en el carrito.</li>';
        }
        ?>
     </ul>

</body>
</html>


