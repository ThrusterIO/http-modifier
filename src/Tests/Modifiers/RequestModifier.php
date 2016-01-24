<?php

namespace Thruster\Component\HttpModifier\Tests\Modifiers;

use Psr\Http\Message\RequestInterface;
use Thruster\Component\HttpModifier\RequestModifierInterface;

/**
 * Class RequestModifier
 *
 * @package Thruster\Component\HttpModifier\Tests\Modifiers
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class RequestModifier implements RequestModifierInterface
{
    public function modify(RequestInterface $request)
    {
        return $request;
    }
}
