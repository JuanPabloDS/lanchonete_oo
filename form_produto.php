<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Produto.php'; 
	require 'classes/ProdutoDAO.php';
	$produto = new Produto();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$produtoDAO = new ProdutoDAO();
		$produto = $produtoDAO->get($id);
	}

?>

<div class="row">
	<div class="col">
		<p>&nbsp;</p>
		<form action="controle_produto.php?acao=<?= ( $produto->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($produto->getId() != '' ? $produto->getId() : '')?>" readonly>
			</div>
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" required value="<?= ($produto->getNome() != '' ? $produto->getNome() : '') ?>">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>
</div>

<?php include './layout/footer.php'; ?>