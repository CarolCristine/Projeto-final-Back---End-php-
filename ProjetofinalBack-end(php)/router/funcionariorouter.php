<?php
include_once("controller/funcionarioController.php");
include_once("router/funcionariorouter.php");


router("post", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $FuncionarioController->postFuncionario();
});
router("post", "funcionario/login", function () {
    $FuncionarioController = new FuncionarioController();
    $$FuncionarioController->loginFuncionario();
});

router("get", "funcionario", function () {
    $fFncionarioController = new FuncionarioController();
    $$FuncionarioController->getFuncionario();
});

router("put", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $$FuncionarioController->getFuncionario();
});

router("delete", "funcionario", function () {
    $FuncionarioController = new FuncionarioController();
    $$FuncionarioController->deleteFuncionario();
});
