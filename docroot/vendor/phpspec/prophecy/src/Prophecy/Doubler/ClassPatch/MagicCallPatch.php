<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Doubler\ClassPatch;

<<<<<<< HEAD
use phpDocumentor\Reflection\DocBlock;
use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
=======
use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
use Prophecy\PhpDocumentor\ClassAndInterfaceTagRetriever;
use Prophecy\PhpDocumentor\MethodTagRetrieverInterface;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

/**
 * Discover Magical API using "@method" PHPDoc format.
 *
 * @author Thomas Tourlourat <thomas@tourlourat.com>
<<<<<<< HEAD
 */
class MagicCallPatch implements ClassPatchInterface
{
=======
 * @author Kévin Dunglas <dunglas@gmail.com>
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
class MagicCallPatch implements ClassPatchInterface
{
    private $tagRetriever;

    public function __construct(MethodTagRetrieverInterface $tagRetriever = null)
    {
        $this->tagRetriever = null === $tagRetriever ? new ClassAndInterfaceTagRetriever() : $tagRetriever;
    }

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    /**
     * Support any class
     *
     * @param ClassNode $node
     *
     * @return boolean
     */
    public function supports(ClassNode $node)
    {
        return true;
    }

    /**
     * Discover Magical API
     *
     * @param ClassNode $node
     */
    public function apply(ClassNode $node)
    {
        $parentClass = $node->getParentClass();
        $reflectionClass = new \ReflectionClass($parentClass);

<<<<<<< HEAD
        $phpdoc = new DocBlock($reflectionClass->getDocComment());

        $tagList = $phpdoc->getTagsByName('method');
=======
        $tagList = $this->tagRetriever->getTagList($reflectionClass);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

        foreach($tagList as $tag) {
            $methodName = $tag->getMethodName();

<<<<<<< HEAD
            if (!$reflectionClass->hasMethod($methodName)) {
                $methodNode = new MethodNode($tag->getMethodName());
=======
            if (empty($methodName)) {
                continue;
            }

            if (!$reflectionClass->hasMethod($methodName)) {
                $methodNode = new MethodNode($methodName);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                $methodNode->setStatic($tag->isStatic());

                $node->addMethod($methodNode);
            }
        }
    }

    /**
     * Returns patch priority, which determines when patch will be applied.
     *
     * @return integer Priority number (higher - earlier)
     */
    public function getPriority()
    {
        return 50;
    }
}

