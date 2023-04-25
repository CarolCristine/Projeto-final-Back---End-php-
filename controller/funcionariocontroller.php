<?php
include_once("service/funcionarioservice.php");
include_once("model/funcionario.php");


class FuncionarioController
{
    function postfuncionario()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $funcionario = new Funcionario();
            $funcionario->mount($dadosRequest);

            //Valida o funcionario no sistema
            $funcionario->valid();

            $funcionarioService = new FuncionarioService();
            if ($funcionario->id != null && $funcionario->id != "" && $funcionario->id!= 0) {
                $funcionarioService->update($funcionario);
                echo json_encode(array("message" => "Atualizado!"));
            }
            
                else
            {
            
                $funcionarioService->add($funcionario);
                echo json_encode(array("message" => "Cadastrado!"));
            }
            
            }
         catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
         }
        
    }
    

    function getFuncionario()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            $funcionarioService = new FuncionarioService();
            if (isset($dadosRequest->id)) {
                $result = $funcionarioService->get($dadosRequest->id);
            } else {
                $result = $funcionarioService->getAll();
            }
            echo json_encode(array("message" => "resultado da busca de dados", "dados" => $result));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function putFuncionario()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $funcionario = new Funcionario();
            $funcionario->mount($dadosRequest);

            //Valida o funcionario no sistema
            $funcionario->valid();

            $funcionarioService = new Funcionarioservice();
            $funcionarioService->update($funcionario);
            echo json_encode(array("message" => "Atualizado!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function deleteFuncionario() 
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            if (!$dadosRequest->id) {
                throw new Exception("Erros ao buscar parâmetros para remover!");
            }

            $funcionarioService = new FuncionarioService();
            $funcionarioService->delete($dadosRequest->matricula);
            echo json_encode(array("message" => "Dados removidos!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    }