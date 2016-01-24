<?php

namespace Thruster\Component\HttpModifier\Tests;

use Thruster\Component\HttpModifier\MessageModifierCollection;
use Thruster\Component\HttpModifier\Tests\Modifiers\MessageModifier;

/**
 * Class MessageModifierCollectionTest
 *
 * @package Thruster\Component\HttpModifier\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class MessageModifierCollectionTest extends TestCase
{
    /**
     * @inheritDoc
     */
    public function getCollection(array $argument = [])
    {
        return new MessageModifierCollection($argument);
    }

    /**
     * @inheritDoc
     */
    public function getNewCollectionItem()
    {
        return $this->getMockForAbstractClass('\Thruster\Component\HttpModifier\MessageModifierInterface');
    }

    /**
     * @inheritDoc
     */
    public function getNewMessageItem()
    {
        return $this->getMockForAbstractClass('\Psr\Http\Message\MessageInterface');
    }

    /**
     * @inheritDoc
     */
    public function getModifier()
    {
        return new MessageModifier();
    }
}
