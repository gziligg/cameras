<?php
session_start();

include_once '../conexao/conexao.php';

function getTotalCameras($conexao) {
    $sql = "SELECT COUNT(*) AS total_cameras FROM cameras";
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);
    return $row['total_cameras'];
}

$total_cameras = getTotalCameras($conn);

function getTotalRadios($conexao) {
    $sql = "SELECT COUNT(*) AS total_radios FROM radios"; // Substitua 'radios' pelo nome real da tabela de rádios
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);
    return $row['total_radios'];
}

$total_radios = getTotalRadios($conn);

function getTotalEmpresas($conexao) {
    $sql = "SELECT COUNT(*) AS total_empresas FROM empresas"; // Substitua 'radios' pelo nome real da tabela de rádios
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);
    return $row['total_empresas'];
}

$total_empresas = getTotalEmpresas($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>DashBoard</title>
</head>
<body>
    <nav>
        <i class="logo">Câmeras</i>
        <ul class="nav-menu">
            <li class="nav-item">
                <a class="selected" href="">
                <i class="fas fa-bars"></i>
                <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="dashboard.php">
                <i class="fas fa-video"></i>
                <span class="nav-item">Câmera</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="users.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="radio.php">
                <i class="fas fa-wifi"></i>
                <span class="nav-item">Radio</span>
                </a>
            </li>
        </ul>
        <div class="menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <div class="cont-geral">
        <div class="cont-secundario-dash">
            <div class="config-principal">
                <div class="configsep-1">
                    <h2>Dashboard</h2>
                    <h4>Informações gerais</h4>
                </div>
                <div class="configsep-2">
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-folder-plus"></i></button>
                        <div class="dropdown-content">
                            <a href="#" id="config1">Adicionar câmera</a>
                            <a href="#" id="config2">Adicionar rádio</a>
                        </div>
                    </div>
                    
                    <button id="logoutButton" class="dropbtn2"><i class="fas fa-sign-out-alt"></i></button>
                </div>
            </div>
            <hr class="separ">
            <div class="info-geral">
                <div class="infoscamon">
                    <div class="infoscam">
                        <div class="sepcam-1">
                            <div class="sep2cam-1">
                                <?php
                                    echo "<p>" . $total_cameras . " / Total</p>";
                                ?>
                            </div>
                        </div>
                        <hr class="solid">
                        <div class="sepcam-2">
                            <p>Total de câmeras</p>
                        </div>
                    </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-video"></i>
                    <p>Câmeras</p>
                    </div>
                </div>
                <div class="infosradon">
                    <div class="infoscam">
                            <div class="sepcam-1">
                                <div class="sep2cam-1">
                                    <?php
                                        echo "<p>" . $total_radios . " / Total</p>";
                                    ?>
                                </div>
                            </div>
                            <hr class="solid">
                            <div class="sepcam-2">
                                <p>Total de rádios</p>
                            </div>
                        </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-wifi"></i>
                    <p>Rádios</p>
                    </div>
                </div>
                <div class="infoscamoff">
                    <div class="infoscam-off">
                        <div class="sepcam-1">
                            <div class="sep2cam-1">
                                <p>- / Offline</p>
                            </div>
                            </div>
                            <hr class="solid">
                            <div class="sepcam-2">
                                <p>Câmeras offline</p>
                        </div>
                    </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-video-slash"></i>
                    <p>Câmeras Off</p>
                    </div>
                </div>
                <div  class="infosradoff">
                    <div class="infosradio-off">
                        <div class="sepcam-1">
                            <div class="sep2cam-1">
                                <p>- / Offline</p>
                                </div>
                            </div>
                            <hr class="solid">
                            <div class="sepcam-2">
                                <p>Rádios Offline</p>
                            </div>
                        </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-exclamation-triangle"></i>
                    <p>Rádios Off</p>
                    </div>
                </div>
            </div>
            <div class="dashgeral-cam-user-radio">
                <div class="allcams-dash">
                    <div class="allcams-sep1">
                        <?php
                                // Incluir o arquivo de conexão com o banco de dados
                                include_once '../conexao/conexao.php';

                                // Consultar o banco de dados para obter todas as câmeras
                                $sql = "SELECT * FROM cameras";
                                $resultado = mysqli_query($conn, $sql);

                                // Verificar se há câmeras encontradas
                                if (mysqli_num_rows($resultado) > 0) {
                                    // Loop através de todas as câmeras e exibi-las
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        $empresa_id = $row['empresa'];
                                        $camera_nome = $row['camera_nome'];
                                        $camera_ip = $row['ip'];

                                        $sql2 = "SELECT nome FROM empresas WHERE id='$empresa_id'";
                                        $resultado2 = mysqli_query($conn, $sql2);
                                        
                                        if (mysqli_num_rows($resultado2) > 0) {
                                            while ($row2 = mysqli_fetch_assoc($resultado2)) {

                                                echo '<div class="cameras-dash-info">';
                                                echo '<p>' . $camera_ip . '</p>';
                                                echo '<p>' . $row2['nome'] . '</p>';
                                                echo '<p>' . $camera_nome . '</p>';
                                                echo '</div>';

                                            }
                                        }

                                    }
                                } else {
                                    echo "Nenhuma câmera encontrada.";
                                }

                                // Liberar o resultado da consulta
                                mysqli_free_result($resultado);
                            ?>
                    </div>
                    <div class="difdash-sep-1">
                        <i class="fas fa-video"></i>
                        <p>Câmeras</p>
                    </div>
                </div>
                <div class="allradios-dash">
                    <div class="allradios-sep1">
                        <?php
                            // Incluir o arquivo de conexão com o banco de dados
                            include_once '../conexao/conexao.php';

                            // Consultar o banco de dados para obter todas as câmeras
                            $sql = "SELECT * FROM radios";
                            $resultado = mysqli_query($conn, $sql);

                            // Verificar se há câmeras encontradas
                            if (mysqli_num_rows($resultado) > 0) {
                                // Loop através de todas as câmeras e exibi-las
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $empresa_id = $row['empresa'];
                                    $radio_nome = $row['radio_nome'];
                                    $radio_ip = $row['ip'];

                                    $sql2 = "SELECT nome FROM empresas WHERE id='$empresa_id'";
                                    $resultado2 = mysqli_query($conn, $sql2);
                                    
                                    if (mysqli_num_rows($resultado2) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($resultado2)) {

                                            echo '<div class="cameras-dash-info">';
                                            echo '<p>' . $radio_ip . '</p>';
                                            echo '<p>' . $row2['nome'] . '</p>';
                                            echo '<p>' . $radio_nome . '</p>';
                                            echo '</div>';

                                        }
                                    }

                                }
                            } else {
                                echo "Nenhuma câmera encontrada.";
                            }

                            // Liberar o resultado da consulta
                            mysqli_free_result($resultado);
                        ?>
                    </div>
                    <div class="difdash-sep-1">
                        <i class="fas fa-wifi"></i>
                        <p>Rádios</p>
                    </div>
                </div>
            </div>
            <div class="graficos-cont">
                <div class="sepuser">
                    <div class="subsepuser">
                    </div>
                    <div class="difdash-sep-1">
                        <i class="fas fa-user"></i>
                        <p>Usuários</p>
                    </div>
                </div>
                <div class="sepgrafico">
                    <div class="graficocam">
                        <div class="vwgraficocam"></div>
                        <div class="difdashgraficos-sep-1">
                        <i class="fas fa-video"></i>
                        <p>Câmeras</p>
                        </div>
                    </div>
                    <div class="graficoradio">
                        <div class="vwgraficoradio"></div>
                        <div class="difdashgraficos-sep-1">
                        <i class="fas fa-video"></i>
                        <p>Câmeras</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 1 -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" data-modal="modal1">&times;</span>
            <h2>Adicionar câmera</h2>
            <form action="" class="modal-form">
                <div class="sep1">
                <input type="text" id="nome" class="modal-input" placeholder="Nome">
                <input type="text" id="cep" class="modal-input" placeholder="CEP">
                <input type="text" id="endereco" class="modal-input" placeholder="Endereço">
                </div>
                <div class="sep2">
                <input type="number" id="numero" class="modal-input" placeholder="Número">
                <input type="text" id="contato" class="modal-input" placeholder="Contato">
                <button id="adicionar-empresa" class="modal-button">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal 2 -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close" data-modal="modal2">&times;</span>
            <h2>Adicionar rádio</h2>
            <form action="" class="modal-form">
                <div class="sep1">
                <input type="text" id="nome" class="modal-input" placeholder="Nome">
                <input type="text" id="cep" class="modal-input" placeholder="CEP">
                <input type="text" id="endereco" class="modal-input" placeholder="Endereço">
                </div>
                <div class="sep2">
                <input type="number" id="numero" class="modal-input" placeholder="Número">
                <input type="text" id="contato" class="modal-input" placeholder="Contato">
                <button id="adicionar-empresa" class="modal-button">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../script/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modals = {
                config1: document.getElementById('modal1'),
                config2: document.getElementById('modal2'),
            };

            const modalTriggers = {
                config1: document.getElementById('config1'),
                config2: document.getElementById('config2'),
            };

            Object.keys(modalTriggers).forEach(function(key) {
                modalTriggers[key].addEventListener('click', function(event) {
                    event.preventDefault();
                    modals[key].style.display = 'block';
                });
            });

            const closeButtons = document.querySelectorAll('.close');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal');
                    document.getElementById(modalId).style.display = 'none';
                });
            });

            window.addEventListener('click', function(event) {
                Object.keys(modals).forEach(function(key) {
                    if (event.target == modals[key]) {
                        modals[key].style.display = 'none';
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Função para chamar verificar_ips.php
            function chamarVerificarIps() {
                // Requisição AJAX para chamar o script verificar_ips.php
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Se a requisição for bem-sucedida, você pode processar a resposta aqui
                        var dados = JSON.parse(this.responseText);

                        var infoscamOff = document.querySelector('.infoscam-off');
                        if (infoscamOff) {
                            infoscamOff.querySelector('p').innerText = dados.cameras.total_offline + " / Offline";
                        }

                        var infosradioOff = document.querySelector('.infosradio-off');
                        if (infosradioOff) {
                            infosradioOff.querySelector('p').innerText = dados.radios.total_offline + " / Offline";
                        }
                    }
                };
                xhttp.open("GET", "verificar_ips.php", true);
                xhttp.send();
            }

            // Chamar a função ao carregar a página
            chamarVerificarIps();
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Encontrar o botão de logout pelo ID
            const logoutButton = document.getElementById('logoutButton');

            // Adicionar um evento de clique ao botão de logout
            logoutButton.addEventListener('click', function(event) {
                event.preventDefault();
                // Enviar uma solicitação Ajax para um arquivo PHP para fazer logout
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Redirecionar para a página de login após logout
                        window.location.href = 'login.php';
                    }
                };
                xhttp.open("GET", "logout.php", true);
                xhttp.send();
            });
        });

</script>
</body>
</html>
