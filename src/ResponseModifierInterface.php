<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ResponseModifierInterface
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface ResponseModifierInterface extends ModifierInterface
{
    public function modify(ResponseInterface $response);
}
