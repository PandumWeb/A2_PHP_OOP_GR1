<?php

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please views the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Node_Expression_Binary_LessEqual extends Twig_Node_Expression_Binary
{
    public function operator(Twig_Compiler $compiler)
    {
        return $compiler->raw('<=');
    }
}