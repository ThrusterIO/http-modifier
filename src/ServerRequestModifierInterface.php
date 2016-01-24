<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface RequestModifierInterface
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface ServerRequestModifierInterface extends ModifierInterface
{
    public function modify(ServerRequestInterface $response) : ServerRequestInterface;
}
