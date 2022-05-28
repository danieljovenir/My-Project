<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'home':
            return (new App\Controller\ControllerHome)->render();
        case 'produtos':
            return (new App\Controller\ControllerProdutos)->render();
        case 'adicionarprodutos':
            return (new App\Controller\ControllerAdicionar)->render();
        case 'updateprodutos':
            return (new App\Controller\ControllerUpdateProduto)->render();
        case 'admin':
            return (new App\Controller\ControllerAdmin)->render();
            
    }

    return 'Página não encontrada!';
}
