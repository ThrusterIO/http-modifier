<?php

namespace Thruster\Component\HttpModifier\Tests\Modifiers;

use Psr\Http\Message\ResponseInterface;
use Thruster\Component\HttpModifier\ResponseModifierInterface;

/**
 * Class ResponseModifier
 *
 * @package Thruster\Component\HttpModifier\Tests\Modifiers
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ResponseModifier implements ResponseModifierInterface
{
    public function modify(ResponseInterface $response)
    {
        return $response;
    }
}
