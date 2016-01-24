<?php

namespace Thruster\Component\HttpModifier\Tests;

use Psr\Http\Message\MessageInterface;
use Thruster\Component\HttpModifier\MessageModifierCollection;
use Thruster\Component\HttpModifier\MessageModifierInterface;

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
        return new class implements MessageModifierInterface {
            public function modify(MessageInterface $Message) : MessageInterface
            {
                return $Message;
            }
        };
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
        return $this->getNewCollectionItem();
    }
}
