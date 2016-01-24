<?php

namespace Thruster\Component\HttpModifier\Tests;

use Thruster\Component\HttpModifier\RequestModifierCollection;
use Thruster\Component\HttpModifier\Tests\Modifiers\RequestModifier;

/**
 * Class RequestModifierCollectionTest
 *
 * @package Thruster\Component\HttpModifier\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class RequestModifierCollectionTest extends TestCase
{
    /**
     * @inheritDoc
     */
    public function getCollection(array $argument = [])
    {
        return new RequestModifierCollection($argument);
    }

    /**
     * @inheritDoc
     */
    public function getNewCollectionItem()
    {
        return $this->getMockForAbstractClass('\Thruster\Component\HttpModifier\RequestModifierInterface');
    }

    /**
     * @inheritDoc
     */
    public function getNewMessageItem()
    {
        return $this->getMockForAbstractClass('\Psr\Http\Message\RequestInterface');
    }

    /**
     * @inheritDoc
     */
    public function getModifier()
    {
        return new RequestModifier();
    }
}
