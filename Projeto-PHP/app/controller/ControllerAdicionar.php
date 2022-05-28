<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewAdicionar;
use App\View\ViewHome;

class ControllerAdicionar extends ControllerPadrao
{

    protected function processPage()
    {
        $sTitle = '<br>Adicionar Produto';

        $sContent = ViewAdicionar::render([
            // Passar aqui os parâmetros do conteúdo da página
            'conteudo' => ViewAdicionar::formularioProduto()
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
