<?php 
require 'classes/Categoria.php';
require 'classes/CategoriaDAO.php';

$produto = new Produto();
$produtoDAO = new ProdutoDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id = $_GET['id'];
}

if($acao == 'deletar') {

	$produtoDAO->deletar($id);
	$msg = 'Produto excluído com sucesso';

} else if($acao == 'cadastrar') {

	$produto->setNome($_POST['nome']);
	$produtoDAO->insereProduto($produto);
	$msg = 'Produto cadastrado com sucesso';

} else if($acao == 'editar') {

	$produto->setId($_POST['id']);
	$produto->setNome($_POST['nome']);
	$produtoDAO->alteraProduto($produto);
	$msg = 'Produto alterado com sucesso';
	
}


header("Location: produto.php?msg=$msg");