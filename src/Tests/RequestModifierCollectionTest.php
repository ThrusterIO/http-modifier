<?php

namespace Thruster\Component\HttpModifier\Tests;

use Psr\Http\Message\RequestInterface;
use Thruster\Component\HttpModifier\RequestModifierCollection;
use Thruster\Component\HttpModifier\RequestModifierInterface;

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
        return new class implements RequestModifierInterface {
            public function modify(RequestInterface $request) : RequestInterface
            {
                return $request;
            }
        };
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
        return $this->getNewCollectionItem();
    }
}
