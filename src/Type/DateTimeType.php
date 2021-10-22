<?php
/*
 * This file is part of the BenOSP(Abass Ben Cheik Open-source Projet)
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
class DateTimeType extends BaseType
{
    
    /** {@inheritDoc} */
    public function renderInput(): string
    {
         return sprintf('<input id="%s" name="%s" type="date" class="form-control">', $this->id, $this->name);
    }
}
