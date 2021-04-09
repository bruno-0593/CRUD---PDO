<?php

// CHECK IF YOU WERE SEND DATA VIA POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
    $telefone = (isset($_POST["telefone"]) && $_POST["telefone"] != null) ? $_POST["telefone"] : NULL;
} else if (!isset($id)) {
    // IF NOT DEFINED, NO VALUE FOR VARIABLE $ID
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $email = NULL;
    $telefone = NULL;
}

// MAKE A CONNECTION TO THE DATABASE
class Conexao
{
    protected $conexao;

    public function __construct()
    {
        $this->conecta();
    }

    public function __destruct()
    {
        $this->desconecta();
    }
    public static function desconecta()
    {
        $conexao = null;
    }
    public static function conecta()
    {
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=db_cadastro;', 'root', '');
            $conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("SET NAMES 'utf8';");
            return $conexao;
        } catch (PDOException $e) {
            echo 'ERROR: conexao ' . $e->getMessage();
        }
    }
}

// CREATE AND UPDATE
if (isset($_REQUEST["cadastrar"])) {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE tb_clientes SET nome=?, email=?, telefone=? WHERE id = ?");
            $stmt->bindParam(4, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO tb_clientes (nome, email, telefone) VALUES (?, ?, ?)");
        }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $telefone);
 
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "Dados cadastrados com sucesso!";
                $id = null;
                $nome = null;
                $email = null;
                $telefone = null;
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

?>