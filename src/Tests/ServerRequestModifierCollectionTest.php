<?php

namespace Thruster\Component\HttpModifier\Tests;

use Psr\Http\Message\ServerRequestInterface;
use Thruster\Component\HttpModifier\ServerRequestModifierCollection;
use Thruster\Component\HttpModifier\ServerRequestModifierInterface;

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
        return new class implements ServerRequestModifierInterface {
            public function modify(ServerRequestInterface $response) : ServerRequestInterface
            {
                return $response;
            }
        };
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
        return $this->getNewCollectionItem();
    }
}
