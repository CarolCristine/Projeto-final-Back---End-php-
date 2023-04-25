<?php
include_once("services/funcionarioserviceservice.php");
include_once("model/funcionariomodel.php");


class funcionarioController
{
    function postfuncionario()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $funcionario = new funcionario();
            $funcionario->mount($dadosRequest);

            //Valida o funcionario no sistema
            $funcionario->valid();

            $funcionarioService = new funcionarioService();
            if ($funcionario->id != null && $funcionario->id != "" && $funcionario->$$funcionario!= 0); {
                $funcionarioService->update($funcionario);
                echo json_encode(array("message" => "Atualizado!"));
            
            
                $funcionarioService->add($funcionario);
                echo json_encode(array("message" => "Cadastrado!"));
            }
            
            }
         catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
         }
        
    }
    

    function getfuncionario()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            $funcionarioService = new funcionarioService();
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

    function putfuncionario()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $funcionario = new funcionario();
            $funcionario->mount($dadosRequest);

            //Valida o funcionario no sistema
            $funcionario->valid();

            $funcionarioService = new funcionarioservice();
            $funcionarioService->update($funcionario);
            echo json_encode(array("message" => "Atualizado!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function funcionarioAluno()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            if (!$dadosRequest->id) {
                throw new Exception("Erros ao buscar parâmetros para remover!");
            }

            $funcionarioService = new funcionarioService();
            $funcionarioService->delete($dadosRequest->matricula);
            echo json_encode(array("message" => "Dados removidos!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    }