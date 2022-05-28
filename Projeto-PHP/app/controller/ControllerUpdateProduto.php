<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\Model\ModelProdutos;
use App\View\ViewUpdateProduto;

class ControllerUpdateProduto extends ControllerPadrao
{

    protected function processPage()
    {
        $sTitle = 'Alterar Produto';

        $oProduto = new ModelProdutos();
        $aProdutos = $oProduto->getAll();

        foreach($aProdutos as $aItem) {
            if ($aItem['codigo'] == $_GET['proid']) {
                $aProduto = $aItem;
            }
        }

        $sContent = ViewUpdateProduto::render([
            // Passar aqui os parâmetros do conteúdo da página
            'conteudo' => ViewUpdateProduto::formularioUpdateProduto($aProduto)
        ]);

        $this->footerVars = [
            // Passar aqui os parametros do footer da página
            'footerContent' => '<h5>Lembra-se! Mudar pode dar medo. Mas é uma aventura que pode te levar muito longe.</h5><br><br>'
        ];

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}
