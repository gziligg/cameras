<?php

session_start();

include_once '../conexao/conexao.php';

$resultados = array();

if(isset($_GET['search'])) {

    $search = $conn->real_escape_string($_GET['search']);

    $sql = "SELECT * FROM empresas WHERE nome LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="#" id="mostrar-empresas" class="mostrar-empresas" data-empresa-id="' . $row['id'] . '">';
            echo '<h4>' . $row['nome'] . '</h4>';
            echo '<p>' . $row['operante'] . '</p>';
            echo '</a>';
        }
    }
}

$conn->close();
?>
