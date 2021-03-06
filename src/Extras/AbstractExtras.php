<?php
namespace Dsheiko\Extras;

use Dsheiko\Extras\Chain;

/**
 * Class represents abstract type
 */
abstract class AbstractExtras
{
    /**
     * Start chain
     *
     * @param mixed $value
     * @return Chain
     */
    public static function chain($value)
    {
        return new Chain($value);
    }
}
