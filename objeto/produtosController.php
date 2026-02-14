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

}