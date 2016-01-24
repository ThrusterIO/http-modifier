<?php

namespace Thruster\Component\HttpModifier\Tests;

use Psr\Http\Message\ResponseInterface;
use Thruster\Component\HttpModifier\ResponseModifierCollection;
use Thruster\Component\HttpModifier\ResponseModifierInterface;

/**
 * Class ResponseModifierCollectionTest
 *
 * @package Thruster\Component\HttpModifier\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ResponseModifierCollectionTest extends TestCase
{
    /**
     * @inheritDoc
     */
    public function getCollection(array $argument = [])
    {
        return new ResponseModifierCollection($argument);
    }

    /**
     * @inheritDoc
     */
    public function getNewCollectionItem()
    {
        return new class implements ResponseModifierInterface {
            public function modify(ResponseInterface $response) : ResponseInterface
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
        return $this->getMockForAbstractClass('\Psr\Http\Message\ResponseInterface');
    }

    /**
     * @inheritDoc
     */
    public function getModifier()
    {
        return $this->getNewCollectionItem();
    }
}
