<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>DashBoard</title>
</head>
<body>
    <nav>
        <i class="logo">Radios</i>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="dashinfo.php">
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
                <a class="selected" href="">
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
        <div class="cont-secundario-radio">
            <div class="config-principal">
                <div class="configsep-1">
                    <h2>Usuários</h2>
                    <h4>Gerenciamento de usuários</h4>
                </div>
                <div class="configsep-2">
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-folder-plus"></i></button>
                        <div class="dropdown-content">
                            <a href="#" id="config1">Adicionar usuário</a>
                        </div>
                    </div>
                    <button id="logoutButton" class="dropbtn2"><i class="fas fa-sign-out-alt"></i></button>
                </div>
            </div>
            <hr class="separ">
            <div class="users-geral">
                <div class="users">
                    <div class="subusers">
                        <?php
                            include_once '../conexao/conexao.php';

                            $search = isset($_GET['search']) ? $_GET['search'] : '';

                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $psw_user = $row['senha'];
                                    echo '<div class="userview" data-user-id="' . $row['id'] . '">';
                                        echo '<h4>' . $row['nome'] . '</h4>';
                                        
                                        // Verificação do valor da coluna "acesso"
                                        
                                        echo '<div class="optusers">';
                                        echo '<a class="editbtnuser"><i class="fas fa-pen"></i></a>';
                                        echo '<a class="trashbtnuser"><i class="fas fa-trash"></i></a>';
                                        if ($row['acesso'] == 5478) {
                                            echo '<p style="color: #da7272;">user</p>';
                                        } elseif ($row['acesso'] == 8294) {
                                            echo '<p style="color: #36afff">adm</p>';
                                        }
                                        echo '<input type="hidden" name="senha" value="' . htmlspecialchars($psw_user) . '">';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo 'Nenhum usuário encontrado.';
                            }

                            $conn->close();
                        ?>
                    </div>
                    <div class="users-sep-1">
                        <i class="fas fa-user"></i>
                        <p>Usuários</p>
                    </div>
                </div>
                <div class="editusers">
                    <div class="subeditusers">

                    </div>
                    <div class="users-sep-1">
                        <i class="fas fa-user-edit"></i>
                        <p>Editar usuário</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../script/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOMContentLoaded event triggered.");
            const subContUsersDiv = document.querySelector('.subusers');

            if (subContUsersDiv) {
                console.log("subContUsersDiv found.");
                subContUsersDiv.addEventListener('click', function (event) {
                    console.log("subContUsersDiv click event triggered.");
                    if (event.target.classList.contains('editbtnuser') || event.target.classList.contains('fa-pen')) {
                        event.preventDefault();

                        const userInfoContainer = event.target.closest('.userview');

                        if (userInfoContainer) {
                            const userId = userInfoContainer.getAttribute('data-user-id');
                            const userName = userInfoContainer.querySelector('h4').textContent.trim();
                            const userAccess = userInfoContainer.querySelector('.optusers p').textContent.trim();
                            const userPsw = userInfoContainer.querySelector('input[name="senha"]').value.trim();

                            const xhr = new XMLHttpRequest();
                            xhr.open('GET', `../screen/buscar_informacoes_users.php?userName=${userName}&userAccess=${userAccess}&userPsw=${userPsw}`, true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    const subContInfoDiv = document.querySelector('.subeditusers');
                                    subContInfoDiv.innerHTML = xhr.responseText;
                                } else {
                                    console.error('Erro ao buscar informações do usuário: ' + xhr.status);
                                }
                            };
                            xhr.onerror = function () {
                                console.error('Request error...');
                            };
                            xhr.send();
                        } else {
                            console.error('Elemento pai não encontrado.');
                        }
                    }
                });
            } else {
                console.error("subContUsersDiv not found.");
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
