<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\RequestInterface;

/**
 * Class RequestModifierCollection
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class RequestModifierCollection extends BaseModifierCollection implements RequestModifierInterface
{
    /**
     * @param RequestModifierInterface[] $modifiers
     */
    public function __construct(array $modifiers = [])
    {
        parent::__construct();

        foreach ($modifiers as $modifier) {
            $this->add($modifier);
        }
    }

    /***
     * @param RequestModifierInterface $modifier
     *
     * @return $this
     */
    public function add(RequestModifierInterface $modifier)
    {
        $this->collection[] = $modifier;

        return $this;
    }

    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    public function modify(RequestInterface $request)
    {
        /** @var RequestModifierInterface $modifier */
        foreach ($this->collection as $modifier) {
            $request = $modifier->modify($request);
        }

        return $request;
    }
}
