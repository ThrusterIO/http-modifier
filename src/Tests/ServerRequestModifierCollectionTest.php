<?php

namespace Thruster\Component\HttpModifier\Tests;

use Thruster\Component\HttpModifier\ServerRequestModifierCollection;
use Thruster\Component\HttpModifier\Tests\Modifiers\ServerModifier;

/**
 * Class ServerRequestModifierCollectionTest
 *
 * @package Thruster\Component\HttpModifier\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ServerRequestModifierCollectionTest extends TestCase
{
    /**
     * @inheritDoc
     */
    public function getCollection(array $argument = [])
    {
        return new ServerRequestModifierCollection($argument);
    }

    /**
     * @inheritDoc
     */
    public function getNewCollectionItem()
    {
        return $this->getMockForAbstractClass('\Thruster\Component\HttpModifier\ServerRequestModifierInterface');
    }

    /**
     * @inheritDoc
     */
    public function getNewMessageItem()
    {
        return $this->getMockForAbstractClass('\Psr\Http\Message\ServerRequestInterface');
    }

    /**
     * @inheritDoc
     */
    public function getModifier()
    {
        return new ServerModifier();
    }
}
