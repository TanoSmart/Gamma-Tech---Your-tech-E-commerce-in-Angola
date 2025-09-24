<?php 
include_once "backend/conexao.php";
$produto = $_GET["q"];
$pesquisa = "SELECT * FROM Produtos WHERE nome LIKE '$produto'";

$res = $conn->query($pesquisa);
include_once "produtos.php";
?>