<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewProdutos;

use App\Db\Connection;
use App\Model\ModelProdutos;

class ControllerProdutos extends ControllerPadrao
{
    function processPage() {
        //var_dump(Connection::get());

        $oModelProdutos = new ModelProdutos;

        $a = $oModelProdutos->getAll();

        //var_dump($a);

        $sTitle = 'Produtos';

        $sContent = ViewProdutos::render([
            'produtosContent' => '<div style= "text-align:center">',
            'tabelaProduto' => viewProdutos::getHtmlTabelaProdutos($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processDelete(){
        $iIdProdutos = $_GET['proid'] ??= '';

        $oModelProduto = new ModelProdutos;
        $oModelProduto->id = $iIdProdutos;

        if ($oModelProduto->deleteProdutos()) {
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Produto Excluído com Sucesso!
                </div>'
            ];
        };

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

        if ($oModelProduto->insertProdutos()) {
            $aContent = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                    Produto Inserido com Sucesso!
                </div>'
            ];
        }
        else {
            $aContent = [
                'footerContent' => '<div class="alert alert-danger" role="alert">
                    Não foi possível inserir o Produto!
                </div>'
            ];
        }

        $this->footerVars = $aContent;

        return $this->processPage();
    }

    public function processUpdate() 
    {
        $aDados = [
            'codigo'           => $_POST['codigo'],
            'nome'             => $_POST['nome'],
            'preco'            => $_POST['preco'],
            'precopromocional' => $_POST['precopromocional'],
            'vezes'            => $_POST['vezes']
        ];

        $aWhere = [
            'codigo' => 'codigo = ' . $_POST['codigo']
        ];

        $oModelProduto = new ModelProdutos();

        $aContent = [];

        if ($oModelProduto->updateProduto($aDados, $aWhere)) {
            $aContent = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                    Produto Alterado com Sucesso!
                </div>'
            ];
        }
        else {
            $aContent = [
                'footerContent' => '<div class="alert alert-danger" role="alert">
                    Não foi possível alterar o Produto!
                </div>'
            ];
        }
        
        $this->footerVars = $aContent;

        return $this->processPage();

    }

}