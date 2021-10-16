<?php
/*
 * This file is part of the BenOSP
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);

namespace BenOSP;

/**
 * Abstract type
 *    Each type must extends  this class or implement TypeInterface
 *      This class should not be instantiated
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
abstract class AbstractType implements TypeInterface
{
    
    /** {@inheritDoc} */
    abstract public function build(): string;
}
