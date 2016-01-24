<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\MessageInterface;
use Thruster\Component\HttpModifier\MessageModifierInterface;

/**
 * Class MessageModifierCollection
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class MessageModifierCollection extends BaseModifierCollection implements MessageModifierInterface
{
    /**
     * @param MessageModifierInterface[] $modifiers
     */
    public function __construct(array $modifiers = [])
    {
        parent::__construct();

        $this->collection = (function (MessageModifierInterface ...$modifiers) {
            return $modifiers;
        })(...$modifiers);
    }

    /***
     * @param MessageModifierInterface $modifier
     *
     * @return $this
     */
    public function add(MessageModifierInterface $modifier)
    {
        $this->collection[] = $modifier;

        return $this;
    }

    /**
     * @param MessageInterface $message
     *
     * @return MessageInterface
     */
    public function modify(MessageInterface $message) : MessageInterface
    {
        /** @var MessageModifierInterface $modifier */
        foreach ($this->collection as $modifier) {
            $message = $modifier->modify($message);
        }

        return $message;
    }
}
