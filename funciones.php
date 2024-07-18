<?php
function clear_input($data) {
            $data = trim($data);//  Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
            $data = stripslashes($data);// Devuelve un string con las barras invertidas retiradas \
            $data = htmlspecialchars($data);// Convierte caracteres especiales en entidades HTML <>
            return $data;
    }


    
?>