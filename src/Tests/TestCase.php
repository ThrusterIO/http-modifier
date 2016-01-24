<?php

namespace Thruster\Component\HttpModifier\Tests;

use Psr\Http\Message\MessageInterface;
use Thruster\Component\HttpModifier\BaseModifierCollection;
use Thruster\Component\HttpModifier\ModifierInterface;

/**
 * Class TestCase
 *
 * @package Thruster\Component\HttpModifier\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $argument
     *
     * @return BaseModifierCollection
     */
    abstract public function getCollection(array $argument = []);

    /**
     * @return ModifierInterface
     */
    abstract public function getNewCollectionItem();

    /**
     * @return MessageInterface
     */
    abstract public function getNewMessageItem();

    /**
     * @return ModifierInterface
     */
    abstract public function getModifier();

    public function testConstructorAddition()
    {
        $given = [];
        for ($i = 0; $i < 10; $i++) {
            $given[] = $this->getNewCollectionItem();
        }

        $collection = $this->getCollection($given);

        $this->assertEquals($given, $collection->all());
    }

    public function testMethodAddition()
    {
        $given = [];
        $collection = $this->getCollection($given);

        for ($i = 0; $i < 10; $i++) {
            $item = $this->getNewCollectionItem();

            $collection->add($item);
            $given[] = $item;
        }

        $this->assertEquals($given, $collection->all());
    }

    public function testModify()
    {
        $collection = $this->getCollection();
        $collection->add($this->getModifier());

        $expected = $this->getNewMessageItem();
        $given = $collection->modify($expected);

        $this->assertEquals($expected, $given);
    }
}
