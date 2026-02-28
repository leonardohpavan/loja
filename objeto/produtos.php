<?php

Class produtos {
    public $id;
    public $nome;
    public $descricao;
    public $quantidade;
    public $preco;
    public $bd;
    public $img;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM produtos";
        $resultado = $this->bd->query($sql);
        $resultado -> execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaProduto($pesquisa, $tipo){
        if($tipo == "id"){
            $sql = "SELECT * FROM produtos WHERE id = :pesquisa";
        } else {
            $sql = "SELECT * FROM produtos WHERE nome LIKE :pesquisa";
            $pesquisa = "%".$pesquisa."%";
        }
        $resultado = $this->bd->prepare($sql);
        $resultado -> bindParam(':pesquisa', $pesquisa);
        $resultado -> execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);

    }

    public function cadastrar(){
        $sql = "INSERT INTO produtos (nome, descricao, quantidade, preco) VALUES(:nome, :descricao, :quantidade, :preco)";

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':quantidade', $this->quantidade, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }

    }



}

