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
 * {@inheritDoc}, input password type
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class PasswordType extends BaseType {
    
    /** {@inheritDoc} */
    public function renderInput(): string
    {
         return sprintf('<input type="password" name="%s" value="%s"/>',  $this->name, $this->value);   
    }
}
