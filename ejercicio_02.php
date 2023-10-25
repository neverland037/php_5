<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Ejercicio 02</title>
</head>

<body>
    <a href="index.php">INICIO</a> <br>

    <header>
        <h1 id="Centrado">Casa de Prestamo</h1>
        <img src="img/casas.png" width="650" height="350">
    </header>
    <section>
        <?php
        error_reporting(0);
        $Cliente = $_POST['txt_Cliente'];
        $Monto = $_POST['txt_Monto'];
        $Fecha_Actual = strtotime(date("Y-m-d"));
        if (isset($_POST['Btn_Calcular']) && !empty($Cliente) && !empty($Monto)) {
            if ($_POST['txt_Cliente']);
            $Cuotas = $_POST['selCuotas'];
            if ($Cuotas == "3") {
                $sel3 = "SELECTED";
                $Descuento = ($Monto * 0.05);
            } else $sel3 = "";
            if ($Cuotas == "6") {
                $sel6 = "SELECTED";
                $Descuento = ($Monto * 0.07);
            } else $sel6 = "";
            if ($Cuotas == "9") {
                $sel9 = "SELECTED";
                $Descuento = ($Monto * 0.10);
            } else $sel9 = "";
            if ($Cuotas == "12") {
                $sel12 = "SELECTED";
                $Descuento = ($Monto * 0.20);
            } else $sel12 = "";
            $Total = $Monto + $Descuento;
        }
        ?>

        <form method="post">
            <div class="borde2">
                <table border="0" cellpadding="7" cellspacing="7">
                    <tr>
                        <td>Cliente: </td>
                        <td><input type="text" value="<?php echo $Cliente; ?>" name="txt_Cliente" size="70"></td>
                        <td class="error"> <?php if (isset($_POST['Btn_Calcular']) &&  empty($Cliente)) {
                                                echo "Debes registrar <br> nombre del cliente";
                                            }
                                            ?>
                        </td>

                    <tr>
                    <tr>
                        <td>Monto <br> Prestado: </td>
                        <td><input type="text" value="<?php echo $Monto; ?>" name="txt_Monto"></td>
                        <td class="error">
                            <?php if (isset($_POST['Btn_Calcular'])) {
                                if (empty($Monto)) {
                                    echo "Debes registrar <br> correctamente <br> el monto de <br> prestamo ";
                                }
                            }
                            ?>
                        </td>

                    <tr>
                        <td>Cuotas: </td>
                        <td>
                            <select name="selCuotas">
                                <option value="3" <?php echo $sel3; ?>>3</option>
                                <option value="6" <?php echo $sel6; ?>>6</option>
                                <option value="9" <?php echo $sel9; ?>>9</option>
                                <option value="12" <?php echo $sel12; ?>>12</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="Btn_Calcular" value="Cotizar">
                        <td></td>
                    </tr>

                </table>

                <?php
                if (isset($_POST['Btn_Calcular']) && !empty($Cliente) && (!empty($Monto) && is_numeric($Monto)) && !empty($Cuotas)) {
                ?>
                    <table class="Monto" border="0" width="500" cellspacing="7" cellpadding="7">
                        <tr>
                            <td>Nº Cuotas:</td>
                            <td>Fechas de Pago: </td>
                            <td>Monto Mensual: </td>

                        </tr>
                        <?php
                        $Mensual = ($Total / $Cuotas);

                        for ($k = 1; $k <= $Cuotas; $k++) {
                        ?>
                            <tr>
                                <td><?php echo $k . "Cuota"  ?></td>
                                <td><?php echo date("d/m/Y", $Fecha_Actual); ?></td>
                                <td><?php echo "S/.  " . number_format($Mensual, '2', '.'); ?></td>

                            </tr>
                        <?php
                            $Fecha_Actual = strtotime("+1 month", $Fecha_Actual);
                        }
                        ?>
                    </table>
                <?php
                }
                ?>
            </div>
        </form>
    </section>
    <footer>
        <h6 id="Centrado">Realizado por William Manchego</h6>
    </footer>
</body>

</html>
