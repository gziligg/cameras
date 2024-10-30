<?php

session_start();

// Verificar se os parâmetros foram enviados via método GET
if (isset($_GET['userName']) && isset($_GET['userAccess']) && isset($_GET['userPsw'])) {
    // Obter os parâmetros
    $nomeUser = $_GET['userName'];
    $acesso = $_GET['userAccess'];
    $psw_user = $_GET['userPsw'];

    // Definir o valor de exibição para a input de acesso com base no valor de $acesso
    $acessoDisplay = '';
    if ($acesso == 'user') {
        $acessoDisplay = '5478';
    } elseif ($acesso == 'adm') {
        $acessoDisplay = '8294';
    } else {
        $acessoDisplay = htmlspecialchars($acesso); // Fallback to display the original value if it's neither 'user' nor 'adm'
    }

    // Exibir as informações do usuário em um formato específico
    echo '<div class="informrads">';
    echo '<input type="text" value="' . htmlspecialchars($nomeUser) . '" required></input>';
    echo '<input type="number" value="' . htmlspecialchars($acessoDisplay) . '" required></input>';
    echo '<input type="text" value="' . htmlspecialchars($psw_user) . '" required></input>';
    echo '</div>';

} else {
    // Se os parâmetros não foram fornecidos, retorne uma mensagem de erro
    echo 'Dados do usuário não fornecidos.';
}
?>
