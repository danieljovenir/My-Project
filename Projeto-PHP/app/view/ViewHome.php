<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHome extends ViewPadrao
{
    const ITEM_POR_LINHA = 4;

    static function getHtmlTabelaHome(array $b) {
        $sHtml = "";

        $numero = 1;
        $adicionaInicio = 1;
        $adicionaFinal = 4;

        foreach ($b as $Coluna) {
            $sHtml .= 

            ($numero == $adicionaInicio ? '<div class="row">' : '') .'

            <div class="card col-6" style="margin: 15px 15px;width: 18rem;">
            <img src="http://localhost/projeto-php/img/'.$Coluna["nome"].'.jpg" class="card-img-top" alt="teste" height="300px">
            <div class="card-body">
                <h6 class="card-title">'.$Coluna["nome"].'</h6>
                <p class="card-text">Preço Promocional:<br><b>R$'  .$Coluna["preco"] .' à vista ou '.$Coluna["vezes"] .' de R$' .$Coluna["precopromocional"] .'</b></p>
                <b>Código:'.$Coluna["codigo"] .'</b><br>

                <a href="#" class="btn btn-dark">Adicionar no carrinho</a>

            </div>
            </div><br>

            ' . ($numero == $adicionaFinal ? '</div>' : '');

            if ($numero == $adicionaFinal) {
                $adicionaInicio += self::ITEM_POR_LINHA;
                $adicionaFinal += self::ITEM_POR_LINHA;
            }
            $numero++;
        }

        return $sHtml;
    }
}