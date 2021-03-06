<?php
declare(strict_types=1);

namespace jlgtechnology\model;

use \Exception as Exception;

abstract class AbstractModel
{
    private $_arrData;

    abstract public static function getFields() : array;

    /**
     * Each model should have a create function that invokes a 
     * private/protected constructor
     */
    protected function __construct(array $arrData = [])
    {
        $this->_arrData = $arrData;
    }

    protected function _getField(
        string $strField,
        $mixedDefault = null
    )
    {
        if (!in_array($strField, static::getFields())) {
            throw new Exception(
                "'$strField' is not a valid field for " . get_class($this)
            );
        }

        return $this->_arrData[$strField] ?? $mixedDefault;
    }

    protected function _setField(
        string $strField,
        $mixedValue,
        $mixedDefault = null
    )
    {
        if (!in_array($strField, static::getFields())) {
            throw new Exception(
                "'$strField' is not a valid field for " . get_class($this)
            );
        }

        $this->_arrData[$strField] = $mixedValue ?? $mixedDefault;

        return $this;
    }
}