<?php
session_start();


if(isset($_GET['empresa_id'])) {
    $empresa_id = $_GET['empresa_id'];

    $_SESSION['id_empresa'] = $empresa_id;

    include_once '../conexao/conexao.php';

    $consulta_empresa = "SELECT nome FROM empresas WHERE id = ?";
    $stmt_empresa = $conn->prepare($consulta_empresa);
    $stmt_empresa->bind_param("i", $empresa_id); // Aqui está o erro
    $stmt_empresa->execute();
    $result_empresa = $stmt_empresa->get_result();

    if ($result_empresa->num_rows > 0) {
        // Obter o nome da empresa
        $row_empresa = $result_empresa->fetch_assoc();
        $nome_empresa = $row_empresa['nome'];

        // Armazenar o nome da empresa em outra sessão
        $_SESSION['nome_empresa'] = $nome_empresa;
    }

    $sql = "SELECT * FROM cameras WHERE empresa = $empresa_id";
    $result = $conn->query($sql);

    // Verificar se a consulta retornou resultados
    if ($result) {
        if ($result->num_rows > 0) {

            echo '<div class="cam">';

            while ($row = $result->fetch_assoc()) {
                $ip = $row['ip'];
                $local = $row['localiza'];
                $porta = $row['porta'];
                $usuario = $row['usuario'];
                $psw_cam = $row['senha'];
                $foto_cam = $row['imagem'];
                $port = 80; // Porta padrão para HTTP, ajuste conforme necessário

                // Verifica a disponibilidade do IP
                $socket = @fsockopen($ip, $port, $errno, $errstr, 1);
                
                echo '<form class="ip_form" id="ip_form">';
                echo '<div class="camsview">';
                echo '<div class="ip_form_sub_sep">';
                echo '<h4>' . $row['camera_nome'] . '</h4>';
                echo '<p>' . $row['ip'] . '</p>';
                echo '<input type="hidden" name="local" value="' . htmlspecialchars($local) . '">'; // Adiciona o input hidden para o local
                echo '<input type="hidden" name="porta" value="' . htmlspecialchars($porta) . '">'; // Adiciona o input hidden para o local
                echo '<input type="hidden" name="usuario" value="' . htmlspecialchars($usuario) . '">'; // Adiciona o input hidden para o local
                echo '<input type="hidden" name="senha" value="' . htmlspecialchars($psw_cam) . '">'; // Adiciona o input hidden para o local
                echo '<input type="hidden" name="imagem" value="' . htmlspecialchars($foto_cam) . '">'; // Adiciona o input hidden para o local
                echo '</div>';
                echo '<div class="camsconfig">';
                echo '<a class="info-cams" target="_blank"><i class="fas fa-chart-bar"></i></a>';
                
                // Se o IP estiver online, o link para o vídeo será habilitado
                if ($socket) {
                    echo '<a href="http://' . $row["ip"] . '" target="_blank"><i class="fas fa-video" style="color: #555;"></i></a>';
                    fclose($socket);
                } else {
                    // Se o IP estiver offline, o link para o vídeo será desabilitado
                    echo '<a href="javascript:void(0);" disabled><i class="fas fa-video-slash" style="color: #da7272;"></i></a>';
                }

                // Exibir o status "ONLINE" ou "OFFLINE" ao lado do botão "Entrar" dependendo do status da câmera
                if ($socket) {
                    echo '<span style="color:green;"><i class="fa fa-circle" aria-hidden="true"></i></span>';
                } else {
                    echo '<span style="color:red;"><i class="fa fa-circle" aria-hidden="true"></i></span>';
                }

                echo '</div>';
                echo '</div>';
                echo '</form>';
            }

            echo '</div>';
        } else {
            echo 'Nenhuma câmera encontrada para esta empresa.';
        }
    } else {
        echo 'Erro ao executar a consulta: ' . $conn->error;
    }

    $conn->close();
} else {
    echo 'ID da empresa não fornecido.';
}
?>
