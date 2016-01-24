<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\MessageInterface;

/**
 * Interface MessageModifierInterface
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface MessageModifierInterface extends ModifierInterface
{
    public function modify(MessageInterface $message) : MessageInterface;
}
