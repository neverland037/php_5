<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <a href="index.php">INICIO</a> <br>

    <header>
        <img src="img/electrodomesticos.png" width="650" height="350">
        <h1 class="centrado">Venta de Productos Electromésticos</h1>
    </header>
    <?php
    error_reporting(0);
    $Producto = $_POST['sel_producto'];
    $Cantidad = isset($_POST['txt_cantidad']) ? $_POST['txt_cantidad'] : 0;
    $Precio = 0;

    switch ($Producto) {
        case 'Lavadora':
            $Precio = 1500;
            break;
        case 'Refrigeradora':
            $Precio = 3500;
            break;
        case 'Radiograbadora':
            $Precio = 500;
            break;
        case 'Tostadora':
            $Precio = 150;
            break;
    }
    if ($Producto == "Lavadora")
        $selL = 'SELECTED';
    else
        $selL = "";

    if ($Producto == "Refrigeradora")
        $selRe = 'SELECTED';
    else
        $selRe = "";

    if ($Producto == "Radiograbadora")
        $selRa = 'SELECTED';
    else
        $selRa = "";

    if ($Producto == "Tostadora")
        $selT = 'SELECTED';
    else
        $selT = "";
    ?>
    <section>
        <form method="post">
            <table border="0" width="500" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Producto</td>
                    <td>
                        <select name="sel_producto" onchange="this.form.submit()">
                            <option value="" disable selected>Seleccione</option>
                            <option value="Lavadora" <?php echo $selL; ?>>Lavadora</option>
                            <option value="Refrigeradora" <?php echo $selRe; ?>>Refrigeradora</option>
                            <option value="Radiograbadora" <?php echo $selRa; ?>>Radiograbadora</option>
                            <option value="Tostadora" <?php echo $selT; ?>>Tostadora</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="text" name="txt_precio" readonly="readonly" value="<?php if ($_POST['sel_producto']) echo number_format($Precio, '2', '.') ?>"></td>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td><input type="text" name="txt_cantidad" value="<?= $Cantidad; ?>"> </td>
                    <td><input type="submit" name="btn_calcular" value="Calcular"></td>
                </tr>
                <?php
                if ($Cantidad > 0) {
                    $SubTotal = $Precio * $Cantidad;
                }
                ?>
                <tr>
                    <td>Sub - Total</td>
                    <td><input type="text" readonly="readonly" name="txt_subtotal" value="<?= isset($SubTotal) ? 'S/. ' . number_format($SubTotal, 2, '.') : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Cuotas</td>
                    <td>
                        <select name="sel_cuotas" onchange="this.form.submit()">
                            <option value="" disable selected>Seleccione</option>
                            <option value="3" <?= ($_POST['sel_cuotas'] === '3') ? 'selected' : ''; ?>>3</option>
                            <option value="6" <?= ($_POST['sel_cuotas'] === '6') ? 'selected' : ''; ?>>6</option>
                            <option value="9" <?= ($_POST['sel_cuotas'] === '9') ? 'selected' : ''; ?>>9</option>
                            <option value="12" <?= ($_POST['sel_cuotas'] === '12') ? 'selected' : ''; ?>>12</option>
                        </select>
                    </td>
                </tr>
                <tr id="fila">
                    <td>Nº Letras</td>
                    <td>Monto</td>
                </tr>
                <?php
                if ($Cantidad > 0) {
                    $Cuotas = $_POST['sel_cuotas'];
                    $k = 1;
                    $MontoMensual = $SubTotal / $Cuotas;
                    while ($k <= $Cuotas) {
                ?>
                        <tr>
                            <td><?php echo $k; ?> </td>
                            <td><?php echo 'S/. ' . number_format($MontoMensual, 2, '.'); ?> </td>
                        </tr>
                <?php
                        $k++;
                    }
                }
                ?>
            </table>
        </form>
    </section>
    <footer>
        <h6 class="centrado">Realizado por William Manchego</h6>
    </footer>
</body>

</html>