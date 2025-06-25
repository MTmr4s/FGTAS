<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header('Location: controller/autenticaController.php?op=loginForm');
    exit(); }

require '../model/PerguntaModel.php';

switch ($_REQUEST['op']) {
    case 'formPergunta': formPergunta();
        break;
    case 'incluir': incluir();
        break;
    case 'alterar': alterar();
        break;
    case 'listar': listarPergunta();
        break;
    case 'listarN': listarPerguntasInativos();
        break;
    case 'inicio': index();
        break;
    case 'buscaId': buscarIdPergunta();

}

function formatarDataHora($dataHora) {
    return date('d/m/Y H:i', strtotime($dataHora));
}


function formPergunta(){
    include_once '../view/pages/formPerguntaPublico.php';
}


function incluir() {
    $op= 'incluir';
    $idUsuario = $_SESSION['idUsuario'];
    $perguntaModel = new PerguntaModel();
    $perguntaModel->setDescricaoPergunta($_POST['descricaoPergunta']);
    $perguntaModel->setAtivo('s');
    $perguntaModel->setIdUsuario($idUsuario);
    $perguntaModel->setIdPublico($_REQUEST['idPublico']);
    $perguntaModel->incluir();
}


function listarPergunta(){
    $idPublico = $_REQUEST['idPublico'];
    $perguntaModel = new PerguntaModel();
    $perguntas = $perguntaModel->listarPergunta($idPublico);
    include_once '../view/pages/inicialPergunta.php';
    
}

function listarPerguntasInativos(){
    $idPublico = $_REQUEST['idPublico'];
    $perguntaModel = new PerguntaModel();
    $perguntas = $perguntaModel->listarPerguntaInativo($idPublico);
    include_once '../view/pages/inicialPergunta.php';
    
}

function index(){
    include_once '../index.php';
   
}

function buscarIdPergunta(){
    $op= 'alterar';
    $idPergunta = $_GET['idPergunta'];
    $perguntaModel = new PerguntaModel;
    $pergunta = $perguntaModel->buscarPorId($idPergunta);
    include_once '../view/pages/formPerguntaPublico.php';

}

function alterar() {
    $idUsuario = 1;
    $perguntaModel = new PerguntaModel();
    $perguntaModel->setDescricaoPergunta($_POST['descricaoPergunta']);
    $perguntaModel->setAtivo($_POST['ativo']);
    $perguntaModel->setIdPublico($_POST['idPublico']);
    $perguntaModel->setIdPergunta($_POST['idPergunta']);
    $perguntaModel->setIdUsuario($idUsuario);
    $perguntaModel->alterar();
}






?>
