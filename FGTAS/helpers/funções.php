<?php 

function formatarDataHora($dataHora) {
    return date('d/m/Y H:i', strtotime($dataHora));
}



?>