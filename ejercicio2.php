<?php
    include (dirname(__FILE__)."/"."const2.php");

    if(count($_GET)==3){
        $precio = $_GET['precio'];
        $cantidad = $_GET['cantidad'];
        $tipoPago = $_GET['tipoPago'];
    
        $cesta = $precio*$cantidad;
    
        if ($tipoPago == 0) { $descuentoAplicado = $cesta - (DESCUENTO_20*$precio) - (DESCUENTO_EFECTIVO*$precio); $tipoPago = "Efectivo";} 
        elseif ($tipoPago == 1) { $descuentoAplicado = $cesta - (DESCUENTO_20*$precio) + (CARGO_TARJETA*$precio); $tipoPago = "Tarjeta de crédito";}
        elseif ($tipoPago == 2) { $descuentoAplicado = $cesta - (DESCUENTO_20*$precio); $tipoPago = "Otros";}
    
        echo '<table class=tabla>
            <tr>
                <td>Precio unidad:</td>
                <td>'.$precio.'€</td>
            </tr>
            <tr>
                <td>Precio con descuento aplicado:</td>
                <td>'.round($descuentoAplicado, 2, PHP_ROUND_HALF_ODD).'€</td>
            </tr>
            <tr>
                <td>Cantidad:</td>
                <td>x'.$cantidad.'</td>
            </tr>
            <tr>
                <td>Tipo de Pago:</td>
                <td>'.$tipoPago.'</td>
            </tr>
        </table>';
    }else{ echo "ERROR: cantidad de parametros es incorrecto"; };   