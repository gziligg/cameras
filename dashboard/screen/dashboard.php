<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>DashBoard</title>
</head>
<body>
    <nav>
        <i class="logo">Câmeras</i>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="dashinfo.php">
                <i class="fas fa-bars"></i>
                <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="selected" href="dashboard.php">
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
                <span class="nav-item">Rádio</span>
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
        <div class="cont-secundario-pricipal">
            <div class="config-principal">
                <div class="configsep-1">
                    <h2>Câmeras</h2>
                    <h4>Informações das câmeras</h4>
                </div>
                <div class="configsep-2">
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-folder-plus"></i></button>
                        <div class="dropdown-content">
                            <a href="#" id="config1">Adicionar empresa</a>
                            <a href="#" id="config2">Adicionar câmera</a>
                        </div>
                    </div>
                    <button id="logoutButton" class="dropbtn2"><i class="fas fa-sign-out-alt"></i></button>
                </div>
            </div>
            <hr class="separ">
            <div class="telaprincipal">
                <div class="emps">
                    <div class="subemps" id="subemps">
                        <?php
                            include_once '../conexao/conexao.php';

                            $search = isset($_GET['search']) ? $_GET['search'] : '';

                            $sql = "SELECT * FROM empresas";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<a href="#" class="empview" data-empresa-id="' . $row['id'] . '">';
                                    echo '<h4>' . $row['nome'] . '</h4>';
                                    echo '</a>';
                                }
                            } else {
                                echo 'Nenhum atleta encontrado.';
                            }

                            $conn->close();
                        ?>
                    </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-building"></i>
                    <p>Empresas</p>
                    </div>
                </div>
                <div class="emp-cams">
                    <div class="subemp-cams" id="subemp-cams">

                    </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-video"></i>
                    <p>Câmeras</p>
                    </div>
                </div>
            </div>
            <div class="telaprincipal-2">
                <div class="camsinform">
                    <div class="sub-camsinform">

                    </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-info"></i>
                    <p>Informações</p>
                    </div>
                </div>
                <div class="imginform">
                    <div class="sub-imginform">
                        
                    </div>
                    <div class="infos-sep-1">
                    <i class="fas fa-images"></i>
                    <p>Imagem</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal 1 -->
        <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" data-modal="modal1">&times;</span>
            <h2>Adicionar empresa</h2>
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


        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOMContentLoaded event triggered.");
            const empresasDiv = document.getElementById('subemps');

            if (empresasDiv) {
                console.log("empresasDiv found.");
                empresasDiv.addEventListener('click', function (event) {
                    console.log("empresasDiv click event triggered.");
                    if (event.target.classList.contains('empview')) {
                        const empresaId = event.target.getAttribute('data-empresa-id');

                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', `buscar_cameras.php?empresa_id=${empresaId}`, true);
                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                const subContCamerasDiv = document.getElementById('subemp-cams');
                                subContCamerasDiv.innerHTML = xhr.responseText;
                            } else {
                                console.error('Erro ao buscar câmeras: ' + xhr.status);
                            }
                        };
                        xhr.send();
                    }
                });
            } else {
                console.error("empresasDiv not found.");
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOMContentLoaded event triggered.");
            const subContCamerasDiv = document.querySelector('.subemp-cams');

            if (subContCamerasDiv) {
                console.log("subContCamerasDiv found.");
                subContCamerasDiv.addEventListener('click', function (event) {
                    console.log("subContCamerasDiv click event triggered.");
                    // Verifica se o elemento clicado é info-cams ou fa-chart-bar
                    if (event.target.classList.contains('info-cams') || event.target.classList.contains('fa-chart-bar')) {
                        event.preventDefault(); // Evita que o link seja seguido

                        // Obtém o elemento pai que contém as informações da câmera
                        const cameraInfoContainer = event.target.closest('.camsview');

                        // Verifica se o elemento p foi encontrado
                        if (cameraInfoContainer) {
                            // Obtém o IP, nome da câmera e local da câmera dentro do elemento pai
                            const ip = cameraInfoContainer.querySelector('p').textContent.trim();
                            const nomeCamera = cameraInfoContainer.querySelector('h4').textContent.trim();
                            const localCamera = cameraInfoContainer.querySelector('input[name="local"]').value.trim();
                            const portaCamera = cameraInfoContainer.querySelector('input[name="porta"]').value.trim();
                            const usuarioCamera = cameraInfoContainer.querySelector('input[name="usuario"]').value.trim();
                            const pswCamera = cameraInfoContainer.querySelector('input[name="senha"]').value.trim();
                            const fotoCamera = cameraInfoContainer.querySelector('input[name="imagem"]').value.trim();

                            const xhr = new XMLHttpRequest();
                            xhr.open('GET', `buscar_informacoes_camera.php?ip=${ip}&nomeCamera=${nomeCamera}&localCamera=${localCamera}&portaCamera=${portaCamera}&usuarioCamera=${usuarioCamera}&pswCamera=${pswCamera}&fotoCamera=${fotoCamera}`, true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    const subContInfoDiv = document.querySelector('.sub-camsinform');
                                    subContInfoDiv.innerHTML = xhr.responseText;
                                } else {
                                    console.error('Erro ao buscar informações da câmera: ' + xhr.status);
                                }
                            };
                            xhr.send();
                        } else {
                            console.error('Elemento pai não encontrado.');
                        }
                    }
                });
            } else {
                console.error("subContCamerasDiv not found.");
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOMContentLoaded event triggered.");
            const subContCamerasDiv = document.querySelector('.subemp-cams');

            if (subContCamerasDiv) {
                console.log("subContCamerasDiv found.");
                subContCamerasDiv.addEventListener('click', function (event) {
                    console.log("subContCamerasDiv click event triggered.");
                    // Verifica se o elemento clicado é info-cams ou fa-chart-bar
                    if (event.target.classList.contains('info-cams') || event.target.classList.contains('fa-chart-bar')) {
                        event.preventDefault(); // Evita que o link seja seguido

                        // Obtém o elemento pai que contém as informações da câmera
                        const cameraInfoContainer = event.target.closest('.camsview');

                        // Verifica se o elemento p foi encontrado
                        if (cameraInfoContainer) {
                            // Obtém o IP, nome da câmera e local da câmera dentro do elemento pai
                            const fotoCamera = cameraInfoContainer.querySelector('input[name="imagem"]').value.trim();

                            const xhr = new XMLHttpRequest();
                            xhr.open('GET', `buscar_imagens_camera.php?fotoCamera=${fotoCamera}`, true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    const subContInfoDiv = document.querySelector('.sub-imginform');
                                    subContInfoDiv.innerHTML = xhr.responseText;
                                } else {
                                    console.error('Erro ao buscar informações da câmera: ' + xhr.status);
                                }
                            };
                            xhr.send();
                        } else {
                            console.error('Elemento pai não encontrado.');
                        }
                    }
                });
            } else {
                console.error("subContCamerasDiv not found.");
            }
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
