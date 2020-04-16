<?php
require 'Model.php';
class ProdudoDAO extends Model
{
    public function __construct()
    {
    	parent::__construct();
        $this->tabela = 'produtos';
        $this->tabela = 'Produto';
    }

     public function insereProduto(Produto $produto) {
    	$values = "null, '{$produto->getNome()}'";
    	return $this->inserir($values);
    }

     public function alteraCategoria(Produto $produto) {
    	$values = "nome = '{$produto->getNome()}'";
    	$this->alterar($produto->getId(), $values);
    }
}