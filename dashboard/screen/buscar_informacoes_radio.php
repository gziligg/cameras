<?php

session_start();

// Verificar se o IP foi enviado via método GET
if (isset($_GET['ip']) && isset($_GET['nomeRadio']) && isset($_GET['localRadio']) && isset($_GET['portaRadio']) && isset($_GET['usuarioRadio']) && isset($_GET['pswRadio'])) {
    // Obter o IP, o nome e o local da câmera
    $ip = $_GET['ip'];
    $nomeRadio = $_GET['nomeRadio'];
    $localRadio = $_GET['localRadio'];
    $porta = $_GET['portaRadio'];
    $usuario = $_GET['usuarioRadio'];
    $psw_rad = $_GET['pswRadio'];

    // Aqui você pode fazer qualquer processamento necessário com esses dados
    // Por exemplo, você pode exibir as informações da câmera em um formato específico

    echo '<div class="informrads">';
    echo '<p>IP: ' . $ip . '</p>';
    echo '<p>Nome: ' . $nomeRadio . '</p>';
    echo '<p>Local: ' . $localRadio . '</p>';
    echo '<p>Porta: ' . $porta . '</p>';
    echo '<p>Usuário: ' . $usuario . '</p>';
    echo '<p>Senha: ' . $psw_rad . '</p>';
    echo '</div>';

} else {
    // Se o IP, o nome, o local, a porta, o usuário, a senha ou a foto da câmera não foram fornecidos, retorne uma mensagem de erro
    echo 'Dados da câmera não fornecidos.';
}
?>


