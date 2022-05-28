<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewAdmin;

use App\Db\Connection;
use App\Model\ModelAdmin;

class ControllerAdmin extends ControllerPadrao
{
    function processPage() {
        //var_dump(Connection::get());

        $sTitle = 'Admin';

        $sContent = ViewAdmin::render();

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processDelete(){
        $iIdProdutos = $_GET['proid'] ??= '';

        $oModelProduto = new ModelProdutos;
        $oModelProduto->id = $iIdProdutos;
        
        $oModelProduto->deleteProdutos();
        return $this->processPage();
    }

    function processInsert(){
        $oNome = $_POST['nome'];
        $oPreco = $_POST['preco'];
        $oPrecoPromocional = $_POST['precopromocional'];
        $oVezes = $_POST['vezes'];

        $oModelProduto = new ModelProdutos;

        $oModelProduto->oNome=$oNome;
        $oModelProduto->oPreco=$oPreco;
        $oModelProduto->oPrecoPromocional=$oPrecoPromocional;
        $oModelProduto->oVezes=$oVezes;

        $oModelProduto->insertProdutos();
        return $this->processPage();
    }
    

}