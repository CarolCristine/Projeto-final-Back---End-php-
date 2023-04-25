<?php
include_once("DAO.php");

class FuncionarioService
{
    function add(Funcionario $funcionario)
    {
        try {
            $sql = "INSERT INTO funcionarios (nome, email, senha, cargo) VALUES (:nome, :email, MD5(:senha), :cargo)";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql); //Iniciar o preparativo para o envio dos dados ao banco;
            $stman->bindParam(":nome", $funcionario->nome); //Troca dos paramentos
            $stman->bindParam(":email", $funcionario->email);
            $stman->bindParam(":senha", $funcionario->senha);
            $stman->bindParam(":cargo", $funcionario->cargo);
            $stman->execute(); //Gravar os dados no banco de dados
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar!" . $e->getMessage());
        }
    }

    function getAll()
    {
        try {
            $sql = "SELECT id, nome, email, cargo, senha  FROM funcionarios WHERE ativo = true";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao listar os dados!" . $e->getMessage());
        }
    }

    function get(int $id)
    {
        try {
            $sql = "SELECT id, nome, email, cargo, senha FROM funcionarios WHERE ativo = true AND id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao listar os dados!" . $e->getMessage());
        }
    }

    function update(Funcionario $funcionario)
    {
        try {
            $sql = "UPDATE funcionarios SET nome = :nome, email = :email WHERE id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":nome", $funcionario->nome);
            $stman->bindParam(":email", $funcionario->email);
            $stman->bindParam(":id", $funcionario->id);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar!" . $e->getMessage());
        }
    }

    function delete(int $id)
    {
        try {
            //$sql = "DELETE FROM aluno WHERE matricula = :matricula";
            $sql = "UPDATE funcionarios SET ativo = false WHERE id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao remover os dados!" . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro no servidor!" . $e->getMessage());
        }
    }


    function login(string $email, string $senha)
    {
        try {
            $sql = "SELECT id, nome, email, ativo FROM funcionarios WHERE ativo = true AND email = :email AND senha = MD5(:senha)";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":email", $email);
            $stman->bindParam(":senha", $senha);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Erro ao remover os dados!" . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro no servidor!" . $e->getMessage());
        }
    }
}