<?php

namespace App\Model;

use App\Db\Connection;
use App\Model\ModelPadrao;

 class ModelProdutos extends ModelPadrao
{
    public $id;

    function getTable(){
        return 'airsoft.tbprodutos';
    }

    function getColumns()
    {
        return 'pistola';
    }

    function deleteProdutos(){
        $iId = $this->id;

        return parent::delete([
            'codigo' => $this->id
        ]);

    }

    function insertProdutos(){
        $oNome = $this->oNome;
        $oPreco = $this->oPreco; 
        $oPrecoPromocional = $this->oPrecoPromocional;
        $oVezes = $this->oVezes;

        return parent::insert([
            'nome'=>$this->getBdValue($oNome),
            'preco'=>$this->getBdValue($oPreco),
            'precopromocional'=>$this->getBdValue($oPrecoPromocional),
            'vezes'=>$this->getBdValue($oVezes),
        ]);
    }

    public function updateProduto($aDados, $aWhere) 
    {
        return $this->update($aDados, $aWhere);
    }


}
