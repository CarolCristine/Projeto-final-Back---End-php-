<?php
include_once("controller/funcionarioController.php");
 include_once("router.php");


router("post", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $FuncionarioController->postFuncionario();
});
router("post", "funcionario/login", function () {
    $FuncionarioController = new FuncionarioController();
    $FuncionarioController->loginFuncionario();
});

router("get", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $FuncionarioController->getFuncionario();
});

router("put", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $FuncionarioController->getFuncionario();
});

router("delete", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $FuncionarioController->deleteFuncionario();
});
