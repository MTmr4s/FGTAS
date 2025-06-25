<?php 

session_start();


include '../model/AutenticaModel.php';

switch($_REQUEST['op']){
    case 'loginForm': loginForm();
        break;
    case 'registrarUsuario': registrarUsuario();
        break;
    case 'autenticar': autenticar();
        break;
    case 'criarUsuario': criarUsuario();
        break;
    case 'logout': logout();
        break;
    case 'listar': listarUsuarios();
        break;
    case 'listarN': listarUsuariosInativo();
        break;
    default: loginform();
        break;
}
function formatarDataHora($dataHora) {
    return date('d/m/Y H:i', strtotime($dataHora));
}

function loginForm(){
    $op = 'login';
    include '../login.php';
}

function registrarUsuario(){
    $op = 'registrarUsuario';
    include '../login.php';
}

function autenticar(){
    $loginUsuario = $_POST['loginUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];

    $autenticaModel = new AutenticaModel;
    $usuario = $autenticaModel->acharUsuario($loginUsuario);

    if ($usuario && password_verify($senhaUsuario, $usuario['senhaUsuario'])) {
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nome'] = $usuario['nomeUsuario'];
        header('Location: ../index.php');
        exit();
    } else {
        echo 'Nome de usuário ou senha inválidos.';
        
    }
}

function criarUsuario(){
    $nomeUsuario = $_POST['nomeUsuario'];
    $senhaUsuario = password_hash($_POST['senhaUsuario'], PASSWORD_BCRYPT);
    $emailUsuario = $_POST['emailUsuario'];
    $loginUsuario = $_POST['loginUsuario'];
    $telefoneCelular = $_POST['telefoneCelular'];
    $ativo = 'S';

    $usuario = new AutenticaModel();
    $usuario->incluir($nomeUsuario, $senhaUsuario, $emailUsuario, $loginUsuario, $telefoneCelular, $ativo);

    header('Location: autenticaController.php?op=loginForm');

}


function listarUsuarios(){
    $usuarioModel = new AutenticaModel();
    $usuarios = $usuarioModel->listarUsuario();
    include_once '../view/pages/inicialUsuario.php';
    
}

function listarUsuariosInativo(){
    $usuarioModel = new AutenticaModel();
    $usuarios = $usuarioModel->listarUsuarioInativo();
    include_once '../view/pages/inicialUsuario.php';
    
}



function logout() {
    
    $_SESSION = array();

    
    session_destroy();

    
    header('Location: autenticaController.php?op=loginForm');
    exit();
}



?>