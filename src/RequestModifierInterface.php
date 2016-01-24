<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\RequestInterface;

/**
 * Interface RequestModifierInterface
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface RequestModifierInterface extends ModifierInterface
{
    public function modify(RequestInterface $request);
}
