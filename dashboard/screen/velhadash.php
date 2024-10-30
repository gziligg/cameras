<?php
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
                <a href="">
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
                <a href="">
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
            <div class="principal-dash">
                <div class="dif-dash-1">
                    <div class="sub-dif-dash-1">
                        <div class="info-dash">
                            <div class="titulo">
                                <p>Resumo do sistemas</p>
                            </div>
                            <?php
                                echo '<div class="separador-dash-info">';
                                echo '<div class="ref">';
                                echo '<label style="color: green;">Câmeras</label>';
                                echo '<p style="color: green;">' . $total_cameras .  '</p>';
                                echo '</div>';
                                echo '<div class="ref">';
                                echo '<label style="color: green;">Radios</label>';
                                echo '<p style="color: green;">' . $total_radios .  '</p>';
                                echo '</div>';
                                echo '<div class="ref">';
                                echo '<label style="color: rgb(67, 119, 231);">Empresas</label>';
                                echo '<p style="color: rgb(67, 119, 231);">' . $total_empresas .  '</p>';
                                echo '</div>';
                                echo '<div class="ref">';
                                echo '<label style="color: red;">Rad off</label>';
                                echo '<p style="color: red;">-</p>';
                                echo '</div>';
                                echo '<div class="ref">';
                                echo '<label style="color: red;">Cam off</label>';
                                echo '<p style="color: red;">-</p>';
                                echo '</div>';
                                echo '</div>';
                            ?>
                        </div>
                        <div class="cams-dash">
                            <h2>Câmeras</h2>                 
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
                    </div>
                    <div class="sub-dif-dash-2">
                        <div class="users-dash">
                            users
                        </div>
                    </div>
                </div>
                <div class="dif-dash-2">
                    <div class="sub-dif-dash-1">
                        <div class="radio-dash">
                            <h2>Radios</h2>
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
                    </div>
                    <div class="sub-dif-dash-3">
                        <div class="grafico-cam">
                            <canvas id="graficoCam"></canvas>
                        </div>
                        <div class="grafico-radio">
                            <canvas id="graficoRadio"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
        // Gerar valores aleatórios para os gráficos
        document.addEventListener("DOMContentLoaded", function() {
            // Função para chamar verificar_ips.php
            function chamarVerificarIps() {
                // Requisição AJAX para chamar o script verificar_ips.php
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Se a requisição for bem-sucedida, você pode processar a resposta aqui
                        var dados = JSON.parse(this.responseText);

                        var graficoCamData = graficoCam.data.datasets[0].data;
                        graficoCamData[1] = dados.cameras.total_online; // Atualiza o valor 2 com o total online
                        graficoCamData[2] = dados.cameras.total_offline; // Atualiza o valor 3 com o total offline

                        // Atualiza o gráfico
                        graficoCam.update();

                        var graficoRadioData = graficoRadio.data.datasets[0].data;
                        graficoRadioData[1] = dados.radios.total_online; // Atualiza o valor 2 com o total online
                        graficoRadioData[2] = dados.radios.total_offline;

                        graficoRadio.update();

                        // Atualizar os valores do gráfico de câmeras
                        var graficoCamData = graficoCam.data.datasets[0].data;
                        graficoCamData[1] = dados.cameras.total_online; // Atualiza o valor 2 com o total online
                        graficoCamData[2] = dados.cameras.total_offline; // Atualiza o valor 3 com o total offline

                        // Atualiza o gráfico
                        graficoCam.update();

                        var graficoRadioData = graficoRadio.data.datasets[0].data;
                        graficoRadioData[1] = dados.radios.total_online; // Atualiza o valor 2 com o total online
                        graficoRadioData[2] = dados.radios.total_offline;

                        graficoRadio.update();

                        // Exibir os dados na div info-dash
                        var infoDash = document.querySelector('.info-dash');
                        infoDash.innerHTML = 
                            '<div class="titulo">' +
                            '<h3>Resumo do sistemas</h3>' +
                            '</div>' +
                            '<div class="separador-dash-info">' +
                            '<div class="ref">' +
                            '<label style="color: green;">Câmeras</label>' +
                            '<p style="color: green;">' + <?php echo $total_cameras; ?> + '</p>' +
                            '</div>' +
                            '<div class="ref">' +
                            '<label style="color: green;">Radios</label>' +
                            '<p style="color: green;">' + <?php echo $total_radios; ?> + '</p>' +
                            '</div>' +
                            '<div class="ref">' +
                            '<label style="color: rgb(67, 119, 231);">Empresas</label>' +
                            '<p style="color: rgb(67, 119, 231);">' + <?php echo $total_empresas; ?> + '</p>' +
                            '</div>' +
                            '<div class="ref">' +
                            '<label style="color: red;">Rad off</label>' +
                            '<p style="color: red;">' + dados.radios.total_offline + '</p>' +
                            '</div>' +
                            '<div class="ref">' +
                            '<label style="color: red;">Cam off</label>' +
                            '<p style="color: red;">' + dados.cameras.total_offline + '</p>' +
                            '</div>' +
                            '</div>';
                    }
                };
                xhttp.open("GET", "verificar_ips.php", true);
                xhttp.send();
            }

            // Chamar a função ao carregar a página
            chamarVerificarIps();
        });

    // Criar gráfico de câmera
// Criar gráfico de câmera
        var ctxCam = document.getElementById('graficoCam').getContext('2d');
        var graficoCam = new Chart(ctxCam, {
            type: 'pie',
            data: {
                labels: ['Total cameras', 'Online', 'Offline'], // Atualiza os rótulos
                datasets: [{
                    label: 'Câmera',
                    data: [<?php echo $total_cameras; ?>, 0, 0], // Atualiza os valores iniciais para 0
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(117, 241, 133, 0.2)',
                        'rgba(255, 99, 132, 0.2)'

                        
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(117, 241, 133, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'right', // Posiciona os rótulos à direita das fatias
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                },
                responsive: true,
                maintainAspectRatio: false // Desativa a manutenção do aspect ratio
            }
        });

        var canvas = document.getElementById('graficoCam');
        canvas.style.width = '100%';
        canvas.style.height = '100%';

        var canvas2 = document.getElementById('graficoRadio');
        canvas2.style.width = '100%';
        canvas2.style.height = '100%';


        // Criar gráfico de rádio
        var ctxRadio = document.getElementById('graficoRadio').getContext('2d');
        var graficoRadio = new Chart(ctxRadio, {
            type: 'pie',
            data: {
                labels: ['Total radios', 'Online', 'Offline'], // Atualiza os rótulos
                datasets: [{
                    label: 'Rádio',
                    data: [<?php echo $total_radios; ?>, 0, 0], // Atualiza os valores iniciais para 0
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(117, 241, 133, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(117, 241, 133, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'right', // Posiciona os rótulos à direita das fatias
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                },
                responsive: true,
                maintainAspectRatio: false // Desativa a manutenção do aspect ratio
            }
        });
    </script>
    <script src="../script/script.js"></script>
</body>
</html>
