<?php

namespace src\DesignPatterns\Prototype;

/**
 * FooBookPrototype类
 */
class FooBookPrototype extends BookPrototype
{
    protected $category = 'Foo';

    /**
     * empty clone
     */
    public function __clone()
    {
    }
}