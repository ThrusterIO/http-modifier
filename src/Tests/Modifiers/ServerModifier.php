<?php

namespace Thruster\Component\HttpModifier\Tests\Modifiers;

use Psr\Http\Message\ServerRequestInterface;
use Thruster\Component\HttpModifier\ServerRequestModifierInterface;

/**
 * Class ServerModifier
 *
 * @package Thruster\Component\HttpModifier\Tests\Modifiers
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ServerModifier implements ServerRequestModifierInterface
{
    public function modify(ServerRequestInterface $request)
    {
        return $request;
    }
}
