<?php

namespace Thruster\Component\HttpModifier\Tests\Modifiers;

use Psr\Http\Message\MessageInterface;
use Thruster\Component\HttpModifier\MessageModifierInterface;

/**
 * Class MessageModifier
 *
 * @package Thruster\Component\HttpModifier\Tests\Modifiers
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class MessageModifier implements MessageModifierInterface
{
    public function modify(MessageInterface $message)
    {
        return $message;
    }
}
