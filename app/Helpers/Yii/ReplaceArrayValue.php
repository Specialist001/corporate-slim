<?php


namespace App\Helpers\Yii;


use Facade\Ignition\Exceptions\InvalidConfig;

class ReplaceArrayValue
{
    /**
     * @var mixed value used as replacement.
     */
    public $value;


    /**
     * Constructor.
     * @param mixed $value value used as replacement.
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Restores class state after using `var_export()`.
     *
     * @param array $state
     * @return ReplaceArrayValue
     * @throws InvalidConfig when $state property does not contain `value` parameter
     * @see var_export()
     * @since 2.0.16
     */
    public static function __set_state($state)
    {
        if (!isset($state['value'])) {
            throw new InvalidConfig('Failed to instantiate class "Instance". Required parameter "id" is missing');
        }

        return new self($state['value']);
    }
}
