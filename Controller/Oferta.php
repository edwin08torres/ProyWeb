<?php

require_once "../Model/Oferta_model.php";

$option = $_REQUEST['op'];
$objetoOferta =  new ofertamodel();

if($option == "listregistros"){
    $arrResponse = array('status' => false, 'data' => "");
    $arroferta = $objetoOferta->getOferta();
    if(!empty($arroferta)){
        if (!empty($arroferta)) {
            for ($i = 0; $i < count($arroferta); $i++) {
                $IDOE = $arroferta[$i]->IDOE;
                $options = '<a href="' . BASE_URL . '/VIEWS/editar-oferta.php?p=' . $IDOE . '" class="btn btn-outline-primary btn-sm" title="Editar registro">
                             <i class="fa-solid fa-pen-to-square"></i>
                         </a>
                         <button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntDelPersonas(' . $IDOE . ')">
                             <i class="fa-solid fa-trash"></i></button>
                             <td id="click" onclick="OfertasEnviadasInfoMore()">Ver</td>
                             ';
                $arroferta[$i]->options = $options;
            }
        }
            $arrResponse['status'] = true;
            $arrResponse['data'] = $arroferta;
      }
      echo json_encode($arrResponse);
      die();
}

if ($option == "registro") {
    if ($_POST) {
        if (
            empty($_POST['txtTitulo']) || empty($_POST['txtFecha'])
            || empty($_POST['txtCategoria'])
        ) {
            $arrResponse = array('status' => false, 'msg' => 'Error de datos');
        } else {
            $srtTitulo = ucwords(trim($_POST['txtTitulo']));
            $srtFecha = ucwords(trim($_POST['txtFecha']));
            $srtCategoria = ucwords(trim($_POST['txtCategoria']));


            $arrpersona = $objetoOferta->insertOferta($srtTitulo, $srtFecha,$srtCategoria);
            if ($arrpersona->id > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al guardar, posiblemente la oferta ya exista');
            }
        }
        echo json_encode($arrResponse);
    }
    die();
}

if ($option == "verregistros") {
    if ($_POST) {
        $idoferta = intval($_POST['IDOE']);
        $arroferta = $objetoOferta->gerOferta($idoferta);
        if (empty($arroferta)) {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrResponse = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $arroferta);
        }
        echo json_encode($arrResponse);
    }
    die();
}

if ($option == "actualizar") {
    if ($_POST) {
        if (
            empty($_POST['txtId']) || empty($_POST['txtTitulo']) || empty($_POST['txtFecha'])
            || empty($_POST['txtCategoria'])
        ) {
            $arrResponse = array('status' => false, 'msg' => 'Error de datos');
        } else {
            $intId = intval($_POST['txtId']);
            $srtNombre = ucwords(trim($_POST['txtTitulo']));
            $srtApellido = ucwords(trim($_POST['txtFecha']));
            $srtEmail = strtolower(trim($_POST['txtCategoria']));

            $arrpersona = $objetoOferta->updateOfertas($intId, $srtNombre, $srtApellido,$srtEmail);
            if ($arrpersona->id > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al guardar, posiblemente la oferta ya exista');
            }
        }
        echo json_encode($arrResponse);
    }
    die();
}

if ($option == "eliminar") {
    if ($_POST) {
        if (empty($_POST['$idOferta'])) {
            $arrResponse = array('status' => false, 'msg' => 'Error de datos');
        } else {
            $idOferta = intval($_POST['$idOferta']);
            $arrInfo = $objetoOferta->delOferta($idOferta);
            if ($arrInfo->id) {
                $arrResponse = array('status' => true, 'msg' => 'Registro eliminado');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
            }
        }
        echo json_encode($arrResponse);
    }
}
if ($option == "buscar") {
    if ($_POST) {
        if (empty($_POST['txtBuscar'])) {
            $arrResponse = array('status' => false, 'msg' => 'Error de datos');
        } else {
            $strBuscar = trim($_POST['txtBuscar']);
            $arrResponse = array('status' => false, 'found' => " ", 'data'=>'');

            $arrInfo = $objetoOferta->getPersonasBusqueda($strBuscar);

            if(!empty($arrInfo)){
                $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
            }
        }
        echo json_encode($arrResponse);
    }
   die();
}
die();
?>