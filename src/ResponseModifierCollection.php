<?php

namespace Thruster\Component\HttpModifier;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ResponseModifierCollection
 *
 * @package Thruster\Component\HttpModifier
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ResponseModifierCollection extends BaseModifierCollection implements ResponseModifierInterface
{
    /**
     * @param ResponseModifierInterface[] $modifiers
     */
    public function __construct(array $modifiers = [])
    {
        parent::__construct();

        foreach ($modifiers as $modifier) {
            $this->add($modifier);
        }
    }

    /***
     * @param ResponseModifierInterface $modifier
     *
     * @return $this
     */
    public function add(ResponseModifierInterface $modifier)
    {
        $this->collection[] = $modifier;

        return $this;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function modify(ResponseInterface $response)
    {
        /** @var ResponseModifierInterface $modifier */
        foreach ($this->collection as $modifier) {
            $response = $modifier->modify($response);
        }

        return $response;
    }
}
