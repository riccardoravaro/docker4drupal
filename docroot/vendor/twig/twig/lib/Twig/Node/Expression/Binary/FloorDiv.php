<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Node_Expression_Binary_FloorDiv extends Twig_Node_Expression_Binary
{
    public function compile(Twig_Compiler $compiler)
    {
<<<<<<< HEAD
        $compiler->raw('intval(floor(');
        parent::compile($compiler);
        $compiler->raw('))');
=======
        $compiler->raw('(int) floor(');
        parent::compile($compiler);
        $compiler->raw(')');
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    public function operator(Twig_Compiler $compiler)
    {
        return $compiler->raw('/');
    }
}
