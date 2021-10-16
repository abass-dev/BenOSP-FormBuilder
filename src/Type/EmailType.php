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

namespace BenOSP\Type;

use BenOSP\Type\BaseType;

/**
 * {@inheritDoc}, input text type
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class EmailType extends BaseType
{
    
    /** {@inheritDoc} */
    public function renderInput(): string
    {
         return sprintf('<input id="%s" name="%s" type="email" value="%s" class="form-control" placeholder="%s">', $this->id, $this->name, $this->value, $this->placeholder);
    }
}
