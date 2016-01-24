<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\MessageInterface;

/**
 * Class BaseModifierCollection
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class BaseModifierCollection
{
    /**
     * @var ModifierInterface[]
     */
    protected $collection;

    public function __construct()
    {
        $this->collection = [];
    }

    /**
     * @return ModifierInterface[]
     */
    public function all() : array
    {
        return $this->collection;
    }
}
