<?php

namespace App\Model;

use App\Db\Connection;

abstract class ModelPadrao
{
    abstract function getTable();

    function getAll()
    {
        $oConnection = Connection::get();
    
        $sSelect = 'select * from '.$this->getTable();

        $oResult = pg_query($oConnection, $sSelect);

        $aData = [];

        while($aResultado = pg_fetch_assoc($oResult)){
             $aData[] = $aResultado;
        }

        return $aData;
    }

    protected function insert($aValues)
    {
        $oConnection = connection::get();

        $sSQL = 'insert into ' . $this->getTable(). ' (' . implode(',', array_keys($aValues))  . ') values ('. implode(',', array_values($aValues)) .')';
          
        return pg_query($oConnection, $sSQL);
    }

    protected function delete($aWhere)
    {
        $oConnection = Connection::get();

        $sSql = 'delete from '.$this->getTable().' where 1=1';

        foreach($aWhere as $sNomeColuna => $sValor){
            $sSql .= ' and ' .$sNomeColuna.' = '.$sValor;
        }

        return pg_query($oConnection, $sSql);
    }

    protected function update($aValues, $aWhere)
    {
        $oConnection = connection::get();

        $sSQL = 'update ' . $this->getTable(). ' set ';

        $iIndice = 1;
        foreach (array_keys($aValues) as $sKey) 
        {
            if ($iIndice == 1) 
            {
                $sSQL .= $sKey . ' = \'' . $aValues[$sKey] . '\' ';
            }
            else 
            {
                $sSQL .= ' , ' . $sKey . ' = \'' . $aValues[$sKey] . '\' ';
            }
            $iIndice++;
        }

        $sSQL .= ' where ';

        foreach($aWhere as $valor) 
        {
            $sSQL .= $valor;
        }
          
        return pg_query($oConnection, $sSQL);
    }

    /**
     * Retorna o valor pronto para ser 
     * adicionado no comando SQL
     * @param mixed $xValue
     * @return mixed
     */
    protected function getBdValue($xValue)
    {
        if (!empty($xValue) || !is_null($xValue)) {
            if (is_string($xValue)) {
                return '\'' . pg_escape_string($xValue) . '\'';
            }

            return $xValue;
        }

        return 'NULL';
    }
}
