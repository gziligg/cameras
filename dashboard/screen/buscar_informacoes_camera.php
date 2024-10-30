<?php

session_start();
// Verificar se o IP foi enviado via método GET
if (isset($_GET['ip']) && isset($_GET['nomeCamera']) && isset($_GET['localCamera']) && isset($_GET['portaCamera']) && isset($_GET['usuarioCamera']) && isset($_GET['pswCamera']) && isset($_GET['fotoCamera'])) {
    // Obter o IP, o nome e o local da câmera
    $ip = $_GET['ip'];
    $nomeCamera = $_GET['nomeCamera'];
    $localCamera = $_GET['localCamera'];
    $porta = $_GET['portaCamera'];
    $usuario = $_GET['usuarioCamera'];
    $psw_cam = $_GET['pswCamera'];
    $foto_cam = $_GET['fotoCamera'];

    // Aqui você pode fazer qualquer processamento necessário com esses dados
    // Por exemplo, você pode exibir as informações da câmera em um formato específico


    echo '<p>IP: ' . $ip . '</p>';
    echo '<p>Nome: ' . $nomeCamera . '</p>';
    echo '<p>Local: ' . $localCamera . '</p>';
    echo '<p>Porta: ' . $porta . '</p>';
    echo '<p>Usuário: ' . $usuario . '</p>';
    echo '<p>Senha: ' . $psw_cam . '</p>';
} else {
    // Se o IP, o nome, o local, a porta, o usuário, a senha ou a foto da câmera não foram fornecidos, retorne uma mensagem de erro
    echo 'Dados da câmera não fornecidos.';
}
?>
