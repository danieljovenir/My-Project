<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewProdutos extends ViewPadrao
{
    const ITEM_POR_LINHA = 4;

    static function getHtmlTabelaProdutos(array $a) {
        $sHtml = "";

        $numero = 1;
        $adicionaInicio = 1;
        $adicionaFinal = 4;

        foreach ($a as $Coluna) {
            $sHtml .= 

            ($numero == $adicionaInicio ? '<div class="row">' : '') .'

            <div class="card col-6" style="margin: 15px 15px;width: 18rem;">
            <img src="http://localhost/projeto-php/img/'.$Coluna["nome"].'.jpg" class="card-img-top" alt="teste" height="300px">
            <div class="card-body">
                <h6 class="card-title">'.$Coluna["nome"].'</h6>
                <p class="card-text">Preço Promocional:<br><b>R$'  .$Coluna["preco"] .' à vista ou '.$Coluna["vezes"] .' de R$' .$Coluna["precopromocional"] .'</b></p>
                <b>Código:'.$Coluna["codigo"] .'</b><br>

                <a class="btn btn" href="index.php?pg=produtos&act=delete&proid=' .$Coluna["codigo"] . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </a>

                <br>

                <a class="btn btn-outline-secondary" href="index.php?pg=updateprodutos&proid=' .$Coluna["codigo"] . ' ">
                Alterar Produto
                </a>
                <br><br>
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