<?php

namespace phpmock\phpunit;

use phpmock\generator\MockFunctionGenerator;
use PHPUnit\Framework\MockObject\Invocation;
use PHPUnit\Framework\MockObject\Matcher\Invocation as InvocationInterface;

/**
 * Removes default arguments from the invocation.
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 * @internal
 */
class DefaultArgumentRemover implements InvocationInterface
{

    /**
     * @SuppressWarnings(PHPMD)
     */
    public function invoked(Invocation $invocation)
    {
    }

    /**
     * @SuppressWarnings(PHPMD)
     */
    public function matches(Invocation $invocation)
    {
        if ($invocation instanceof Invocation\StaticInvocation) {
            $this->removeDefaultArguments($invocation);
        } else {
            MockFunctionGenerator::removeDefaultArguments($invocation->parameters);
        }

        return false;
    }

    public function verify()
    {
    }
    
    /**
     * This method is not defined in the interface, but used in
     * PHPUnit_Framework_MockObject_InvocationMocker::hasMatchers().
     *
     * @return boolean
     * @see \PHPUnit_Framework_MockObject_InvocationMocker::hasMatchers()
     */
    public function hasMatchers()
    {
        return false;
    }

    public function toString() : string
    {
        return __CLASS__;
    }

    /**
     * Remove default arguments from StaticInvocation or its children (hack)
     *
     * @SuppressWarnings(PHPMD)
     */
    private function removeDefaultArguments(Invocation\StaticInvocation $invocation)
    {
        $remover = function () {
            MockFunctionGenerator::removeDefaultArguments($this->parameters);
        };

        $remover->bindTo($invocation, Invocation\StaticInvocation::class)();
    }
}
