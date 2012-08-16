<?php
namespace DNT\WorkshopBundle\Services;

use DNT\WorkshopBundle\Entity\Regla;

/**
 * Service para obtener el resultado de aplicar una regla a un valor.
 *
 */
class RuleManagerService {

    /**
     * Result.
     *
     * @var float $result
     */
    private $result;

    /**
     * Operators.
     *
     * @var array $operators
     */
    private $operators;

    /**
     * Constructor de la clase.
     *
     * @param  $entityManager.
     */
    public function __construct($operators) 
    {
        //$this->operators = array('*' => 'multiply', '/' => 'divide', '+' => 'sum', '-' => 'sub', '%' => 'percent');
        $this->operators = $operators;
        $this->result = null;
    }

    static function multiply($value1, $value2){
        return $value1 * $value2;
    }

    static function sum($value1, $value2){
        return $value1 + $value2;
    }

    static function divide($value1, $value2){
        return floor($value1 / $value2);
    }

    static function sub($value1, $value2){
        return $value1 - $value2;
    }

    static function percent($value, $percent, $dec){
        return number_format($value * $percent/100 ,$dec);
    }

    /**
     * Calcula el resultado de aplicar la regla al valor de entrada.
     *
     * @param integer $value.
     * @param Regla $rule.
     * @return integer $result.
     */
    public function applyRule($value1, Regla $rule)
    {
        $operator = $rule->getOperando();
        $value2 = $rule->getValor();
        if( ($operator !== null) and ($value1 !== null) ){
            $this->result = call_user_func(array($this, $operator), $value1, $value2);
        }
        return $this->result;
    }
} 
