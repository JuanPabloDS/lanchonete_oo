<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 

require 'classes/Produto.php';
require 'classes/ProdutoDAO.php';
$ProdutoDAO = new ProdutoDAO();
$produtos = $produtoDAO->listar();

?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != '') {
	 echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerencias Produtos</h2>
	</div>
	<div class="col-2">
		<a href="form_produto.php" class="btn btn-success">Novo</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($produtos as $produto){ ?>
			<tr>
				<td><?= $produto->getId() ?></td>
				<td><?= $categoria->getNome() ?></td>
				<td>
					<a href="form_produto.php?id=<?= $produto->getId() ?>">Editar</a> | 
					<a href="controle_produto.php?acao=deletar&id=<?= $produto->getId() ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include './layout/footer.php'; ?>