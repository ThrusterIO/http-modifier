<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Class ServerRequestModifierCollection
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ServerRequestModifierCollection extends BaseModifierCollection implements ServerRequestModifierInterface
{
    /**
     * @param ServerRequestModifierInterface[] $modifiers
     */
    public function __construct(array $modifiers = [])
    {
        parent::__construct();

        $this->collection = (function (ServerRequestModifierInterface ...$modifiers) {
            return $modifiers;
        })(...$modifiers);
    }

    /***
     * @param ServerRequestModifierInterface $modifier
     *
     * @return $this
     */
    public function add(ServerRequestModifierInterface $modifier)
    {
        $this->collection[] = $modifier;

        return $this;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return ServerRequestInterface
     */
    public function modify(ServerRequestInterface $request) : ServerRequestInterface
    {
        /** @var ServerRequestModifierInterface $modifier */
        foreach ($this->collection as $modifier) {
            $request = $modifier->modify($request);
        }

        return $request;
    }
}
