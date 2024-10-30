<?php
// Inclua o arquivo de conexão com o banco de dados
include_once '../conexao/conexao.php';

// Função para verificar se um IP está online
function verificarStatusIP($ip, $porta) {
    $conexao = @fsockopen($ip, $porta, $errno, $errstr, 1); // Tente conectar ao IP e porta especificados

    if ($conexao) {
        fclose($conexao); // Fecha a conexão se for bem-sucedida
        return true; // O IP está online
    } else {
        return false; // O IP está offline
    }
}

// Função para contar o número de IPs online e offline
function contarStatusIPs($tabela) {
    global $conn; // Importa a conexão global para dentro da função

    // Consulta para obter os IPs da tabela especificada
    $sql = "SELECT ip FROM $tabela";
    $resultado = mysqli_query($conn, $sql);

    $total_online = 0;
    $total_offline = 0;

    // Verifica o status de cada IP
    while ($row = mysqli_fetch_assoc($resultado)) {
        $ip = $row['ip'];
        $porta = 80; // Porta para testar a conexão (pode ser qualquer porta usada pelo servidor)

        if (verificarStatusIP($ip, $porta)) {
            $total_online++;
        } else {
            $total_offline++;
        }
    }

    return array('total_online' => $total_online, 'total_offline' => $total_offline);
}

// Contar o número de IPs online e offline para câmeras
$resultados_cameras = contarStatusIPs('cameras');

// Contar o número de IPs online e offline para rádios
$resultados_radios = contarStatusIPs('radios');

// Combina os resultados das câmeras e dos rádios
$resultados_totais = array(
    'cameras' => $resultados_cameras,
    'radios' => $resultados_radios
);

// Retorna os resultados como JSON
echo json_encode($resultados_totais);
?>
