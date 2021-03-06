<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Classes;

use Interfaces\IValidator;

/**
 * Class Validator
 * @package Core
 */
class Validator implements IValidator
{
    const LOW_RANGE = 3;
    const SIX = 6;
    const SEVEN = 7;

    /**
     * @param $value
     * @return string
     */
    public function validate($value): string
    {
        if ($value <= self::LOW_RANGE) {
            return 'Your Value is too low';
        } elseif ($value > self::SIX) {
            if ($value == self::SEVEN) {
                return 'Your Value equals to 7';
            } else {
                return 'Your Value is over 7';
            }
        } else {
            return 'Your Value is between 3 and 6';
        }
    }
}