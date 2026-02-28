<?php
include_once "config/database.php";
include_once "produtos.php";
Class produtosController {
    private $bd;
    private $produto;

    public function __construct() {
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->produto = new Produtos($this->bd);
    }

    public function index() {
        return $this->produto->lerTodos();
    }

    public function pesquisaProduto($pesquisa, $tipo){
        return $this->produto->pesquisaProduto($pesquisa, $tipo);
    }


    public function cadastrarProduto($dados){
        $this->produto->nome = $dados["nome"];
        $this->produto->descricao = $dados["descricao"];
        $this->produto->quantidade = $dados["quantidade"];
        $this->produto->preco = $dados["preco"];;

        if($this->produto->cadastrar()){
            header("location:index.php");
            exit();
        }
    }


}