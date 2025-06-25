<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header('Location: controller/autenticaController.php?op=loginForm');
    exit(); }

require '../model/FormAtendimentoModel.php';

switch ($_REQUEST['op']) {
    case 'formAtendimento': formAtendimento();
        break;
    case 'incluir': incluir();
        break;
    case 'alterar': alterar();
        break;
    case 'listar': listarFormAtendimento();
        break;
    case 'listarN': listarFormAtendimentoInativos();
        break;
    case 'inicio': index();
        break;
    case 'buscaId': buscarIdFormAtendimento();

}

function formatarDataHora($dataHora) {
    return date('d/m/Y H:i', strtotime($dataHora));
}


function formAtendimento(){
    include_once '../view/pages/formFormaAtendimento.php';
}


function incluir() {
    $op= 'incluir';
    $idUsuario = $_SESSION['idUsuario'];
    $formAtendimentoModel = new FormAtendimentoModel();
    $formAtendimentoModel->setNomeFormAtendimento($_POST['nomeAtendimento']);
    $formAtendimentoModel->setAtivo('s');
    $formAtendimentoModel->setIdUsuario($idUsuario);
    $formAtendimentoModel->incluir();
}


function listarFormAtendimento(){
    $formAtendimentoModel = new FormAtendimentoModel();
    $formAtendimentos = $formAtendimentoModel->listarFormAtendimento();
    include_once '../view/pages/inicialFormaAtendimento.php';
    
}

function listarFormAtendimentoInativos(){
    $formAtendimentoModel = new FormAtendimentoModel();
    $formAtendimentos = $formAtendimentoModel->listarFormAtendimentoInativo();
    include_once '../view/pages/inicialFormaAtendimento.php';
    
}

function index(){
    include_once '../index.php';
   
}

function buscarIdFormAtendimento(){
    $op= 'alterar';
    $idFormAtendimento = $_GET['idFormAtendimento'];
    $formAtendimentoModel = new FormAtendimentoModel();
    $formAtendimento = $formAtendimentoModel->buscarPorId($idFormAtendimento);
    include_once '../view/pages/formFormaAtendimento.php';

}

function alterar() {
    $idUsuario = 1;
    $formAtendimentoModel = new FormAtendimentoModel();
    $formAtendimentoModel->setNomeFormAtendimento($_POST['nomeAtendimento']);
    $formAtendimentoModel->setAtivo($_POST['ativo']);
    $formAtendimentoModel->setIdFormAtendimento($_POST['idFormAtendimento']);
    $formAtendimentoModel->setIdUsuario($idUsuario);
    $formAtendimentoModel->alterar();
}






?>
