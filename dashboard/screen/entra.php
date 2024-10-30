<?php

session_start();

include_once '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha FROM users WHERE nome = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($user_id, $senha_armazenada);
        $stmt->fetch();

        if ($user_id && $senha === $senha_armazenada) {
            $_SESSION['user_id'] = $user_id;
            echo 'Login realizado com sucesso!';
        } else {
            echo 'Erro ao logar. Tente novamente.';
        }

        $stmt->close();
    } else {
        echo 'Erro na preparação da declaração SQL.';
    }
}

$conn->close();
?>
