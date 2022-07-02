<?php

require_once "../Model/Oferta_model.php";

$option = $_REQUEST['op'];
$objetoOferta =  new ofertamodel();


if ($option == "listregistros") {
    $arrResponse = array('status' => false, 'data' => "");
    $arroferta = $objetoOferta->getTarjeta();
    if (!empty($arroferta)) {
        
        $arrResponse['status'] = true;
        $arrResponse['data'] = $arroferta;
    }
    echo json_encode($arrResponse);
    die();
}