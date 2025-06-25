<?php 
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header('Location: controller/autenticaController.php?op=loginForm');
    exit(); }


switch ($_REQUEST['op']) {
    case 'listarPublicos': listarPublicos();
        break;
    case 'listarFimAtend': listarFim();
        break;
    case 'incluir': incluir();
        break;    
    case 'listarAtendimento': listarAtendimento();
        break;
    case 'listarAtendimentoInativo': listarAtendimentoInativo();
        break;
    case 'alterar': alterar();
        break;
}

function formatarDataHora($dataHora) {
    return date('d/m/Y H:i', strtotime($dataHora));
}


function listarPublicos(){
    include '../model/AtendimentoModel.php';
    $op= 'inicioAtend';
    $Atendimento = new AtendimentoModel();
    $resultados = $Atendimento->listar();
    $publicos = $resultados['publicos'];
    $formAtendimentos = $resultados['formAtendimentos'];
    

    include_once '../view/pages/Atendimento/viewIniciosAten.php';
    
}

function listarFim(){
        include '../model/PerguntaModel.php';     
        $op= '';   
        $idForma = $_REQUEST['id'];
        $idPublico = $_REQUEST['idPublico'];
        $perguntaModel = new PerguntaModel();
        $perguntas = $perguntaModel->listarPergunta($idPublico);
        include_once '../view/pages/Atendimento/viewIniciosAten.php';
        
        
        
    }

function incluir(){
    include '../model/AtendimentoModel.php';
   $op= 'incluir';
   $idUsuario = $_SESSION['idUsuario'];
   $AtendimentoModel = new AtendimentoModel();
   $AtendimentoModel->setIdFormaAtendimento($_POST['idFormaAtendimento']);
   $idPerguntaPublico = isset($_POST['idPerguntaPublico']) && $_POST['idPerguntaPublico'] !== '' ? $_POST['idPerguntaPublico'] : 0;
   $AtendimentoModel->setRespostaAtendimento($_POST['respostaAtendimento']);
   $AtendimentoModel->setAtivo('s');
   $AtendimentoModel->setIdUsuario($idUsuario);
   $AtendimentoModel->incluir();
    
}

function listarAtendimento(){
    include '../model/AtendimentoModel.php';
    $atendimentoModel = new AtendimentoModel();
    $atendimentos = $atendimentoModel->listarAtendimento();
   
    include_once '../view/pages/Atendimento/listarAtendimento.php';
    
}

function listarAtendimentoInativo(){
    include '../model/AtendimentoModel.php';
    $atendimentoModel = new AtendimentoModel();
    $atendimentos = $atendimentoModel->listarAtendimentoInativo();
   
    include_once '../view/pages/Atendimento/listarAtendimento.php';
    
}

function alterar() {
    include '../model/AtendimentoModel.php';
    $idUsuario = 1;
    $formAtendimentoModel = new AtendimentoModel();
    $formAtendimentoModel->setAtivo($_GET['ativo']);
    $formAtendimentoModel->setIdAtendimento($_GET['idAtendimento']);
    $formAtendimentoModel->alterar();
}






?>