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

use BenOSP\AbstractType;

/**
 * {@inheritDoc}, input button type
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class ButtonType extends AbstractType {
    
    /**
     * @var string
     */
    public $text;
    
    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }
    
    /** {@inheritDoc} */
    public function build(): string
    {
     return sprintf('
     <button type="submit">%s</button>
     ', $this->text);   
    }
}