<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header('Location: controller/autenticaController.php?op=loginForm');
    exit(); }


require '../model/PublicoModel.php';

switch ($_REQUEST['op']) {
    case 'formPublico': formPublico();
        break;
    case 'incluir': incluir();
        break;
    case 'alterar': alterar();
        break;
    case 'listar': listarPublicos();
        break;
    case 'listarN': listarPublicosInativos();
        break;
    case 'inicio': index();
        break;
    case 'buscaId': buscarIdPublico();

}

function formatarDataHora($dataHora) {
    return date('d/m/Y H:i', strtotime($dataHora));
}


function formPublico(){
    include_once '../view/pages/formPublico.php';
}


function incluir() {
    $op= 'incluir';
    $idUsuario = $_SESSION['idUsuario'];
    $publicoModel = new PublicoModel();
    $publicoModel->setNomePublico($_POST['nomePublico']);
    $publicoModel->setAtivo('s');
    $publicoModel->setIdUsuario($idUsuario);
    $publicoModel->incluir();
}


function listarPublicos(){
    $publicoModel = new PublicoModel();
    $publicos = $publicoModel->listarPublico();
    include_once '../view/pages/inicialPublico.php';
    
}

function listarPublicosInativos(){
    $publicoModel = new PublicoModel();
    $publicos = $publicoModel->listarPublicoInativo();
    include_once '../view/pages/inicialPublico.php';
    
}

function index(){
    include_once '../index.php';
   
}

function buscarIdPublico(){
    $op= 'alterar';
    $idPublico = $_GET['idPublico'];
    $publicoModel = new PublicoModel;
    $publico = $publicoModel->buscarPorId($idPublico);
    include_once '../view/pages/formPublico.php';

}

function alterar() {
    $idUsuario = 1;
    $publicoModel = new PublicoModel();
    $publicoModel->setNomePublico($_POST['nomePublico']);
    $publicoModel->setAtivo($_POST['ativo']);
    $publicoModel->setIdPublico($_POST['idPublico']);
    $publicoModel->setIdUsuario($idUsuario);
    $publicoModel->alterar();
}






?>
