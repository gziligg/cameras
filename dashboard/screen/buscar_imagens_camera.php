<?php
session_start();

// Verificar se o IP foi enviado via método GET
if (isset($_GET['fotoCamera'])) {
    // Obter o IP, o nome e o local da câmera
    $foto_cam = $_GET['fotoCamera'];

    // Aqui você pode fazer qualquer processamento necessário com esses dados
    // Por exemplo, você pode exibir as informações da câmera em um formato específico

    echo '<img id="imagemCamera" src="../imagens/' . $foto_cam . '" alt="Foto da Câmera">';
    
} else {
    // Se o IP, o nome, o local, a porta, o usuário, a senha ou a foto da câmera não foram fornecidos, retorne uma mensagem de erro
    echo 'Dados da câmera não fornecidos.';
}
?>
