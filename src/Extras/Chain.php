<?php
namespace Dsheiko\Extras;

use Dsheiko\Extras\Arrays;
use Dsheiko\Extras\Collections;
use Dsheiko\Extras\Strings;
use Dsheiko\Extras\Functions;
use Dsheiko\Extras\Numbers;
use Dsheiko\Extras\Booleans;

/**
 * Class represents polymorphic chain, exposing manipulation methods specific to current type of chain target value
 */
class Chain
{
    private $value;

    public function __construct($value = [])
    {
        $this->value = $value;
    }
    /**
     * Factory method
     *
     * @param mixed $value
     * @return \Dsheiko\Extras\Chain
     */
    public static function chain($value = [])
    {
        return new self($value);
    }

    /**
     * Return Extras class sutable for the last state of chain value
     * @param mixed $value
     * @return string
     */
    private static function guessSet($value): string
    {
        switch (true) {
            case Booleans::isBoolean($value):
                return Booleans::class;
            case Numbers::isNumber($value):
                return Numbers::class;
            case Arrays::isArray($value):
                return Arrays::class;
            case Strings::isString($value):
                return Strings::class;
            case Collections::isCollection($value):
                return Collections::class;
            case is_callable($value):
                return Functions::class;
        }
        return "";
    }

    /**
     * Handle request for non-defined method
     *
     * @param string $name
     * @param array $args
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @return \Dsheiko\Extras\Chain
     */
    public function __call(string $name, array $args): Chain
    {
        $class = static::guessSet($this->value);
        // Plain object to Arrays
        if (!$class && is_object($this->value)) {
            $this->value = Arrays::from($this->value);
            $class = Arrays::class;
        }

        if (!$class) {
            throw new \InvalidArgumentException("Do not have methods on given type");
        }

        $call = $class . "::" . $name;

        if (!method_exists($class, $name)) {
            throw new \RuntimeException("'{$class}' does not contain method '{$name}'");
        }
        $this->value = Functions::invoke($call, \array_merge([$this->value], $args));
        return $this;
    }

    /**
     * Bind a then function (function transforms the value)
     *
     * @param callable $callable $function
     * @return \Dsheiko\Extras\Chain
     */
    public function then($callable): Chain
    {
        $this->value = Functions::invoke($callable, [$this->value]);
        return $this;
    }

    /**
     * Alias of then
     *
     * @param callable $callable $function
     * @return \Dsheiko\Extras\Chain
     */
    public function tap($callable): Chain
    {
        return $this->then($callable);
    }

    /**
     * Get chain results (or an element by index)
     *
     * @param int $inx
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }
}
