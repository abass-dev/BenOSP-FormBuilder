<?php
/*
 * This file is part of the BenOSP
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace BenOSP;

/**
 * Abstract type
 *    Each type must implement this interface or extends AbstractType class
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
interface TypeInterface {
   /**
    * The final form builder/render
    * @return string
    */
    public function build(): string;
}