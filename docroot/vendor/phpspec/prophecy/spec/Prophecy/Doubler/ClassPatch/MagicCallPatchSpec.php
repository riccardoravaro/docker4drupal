<?php

namespace spec\Prophecy\Doubler\ClassPatch;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Doubler\Generator\Node\MethodNode;

class MagicCallPatchSpec extends ObjectBehavior
{
    function it_is_a_patch()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Doubler\ClassPatch\ClassPatchInterface');
    }

    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_supports_anything($node)
    {
        $this->supports($node)->shouldReturn(true);
    }

    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_discovers_api_using_phpdoc($node)
    {
        $node->getParentClass()->willReturn('spec\Prophecy\Doubler\ClassPatch\MagicalApi');

        $node->addMethod(new MethodNode('undefinedMethod'))->shouldBeCalled();

        $this->apply($node);
    }

    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_ignores_existing_methods($node)
    {
        $node->getParentClass()->willReturn('spec\Prophecy\Doubler\ClassPatch\MagicalApiExtended');

        $node->addMethod(new MethodNode('undefinedMethod'))->shouldBeCalled();
        $node->addMethod(new MethodNode('definedMethod'))->shouldNotBeCalled();

        $this->apply($node);
    }

<<<<<<< HEAD
=======
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_ignores_empty_methods_from_phpdoc($node)
    {
        $node->getParentClass()->willReturn('spec\Prophecy\Doubler\ClassPatch\MagicalApiInvalidMethodDefinition');

        $node->addMethod(new MethodNode(''))->shouldNotBeCalled();

        $this->apply($node);
    }

    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_discovers_api_using_phpdoc_from_interface($node)
    {
        $node->getParentClass()->willReturn('spec\Prophecy\Doubler\ClassPatch\MagicalApiImplemented');

        $node->addMethod(new MethodNode('implementedMethod'))->shouldBeCalled();

        $this->apply($node);
    }


>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    function it_has_50_priority()
    {
        $this->getPriority()->shouldReturn(50);
    }
}

/**
 * @method void undefinedMethod()
 */
class MagicalApi
{
    /**
     * @return void
     */
    public function definedMethod()
    {

    }
}

/**
<<<<<<< HEAD
=======
 * @method void invalidMethodDefinition
 * @method void
 * @method
 */
class MagicalApiInvalidMethodDefinition
{
}

/**
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 * @method void undefinedMethod()
 * @method void definedMethod()
 */
class MagicalApiExtended extends MagicalApi
{

<<<<<<< HEAD
}
=======
}

/**
 */
class MagicalApiImplemented implements MagicalApiInterface
{

}

/**
 * @method void implementedMethod()
 */
interface MagicalApiInterface
{

}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
