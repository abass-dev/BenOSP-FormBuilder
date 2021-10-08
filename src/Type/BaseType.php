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
 * Html input elements
 * 
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
abstract class BaseType extends AbstractType
{
    /**
     * @var string
     */
    public string $name;
    
    /**
     * @var string
     */
    public string $label;
    
    /**
     * @var string
     */
    public string $value;
    
    /**
     * @var string[]
     */
    public array $classes = [];
    
    /**
     * Html base inputs constructor
     * 
     * @pram string $name          input name value
     * @pram string $label         input label value
     * @pram string $value         input value value
     * @pram string[] $classes     css classes
     * 
     * @return void
     */
    public function __construct(string $name, string $label = "", string $value = "", array $classes = [])
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->classes = $classes;
    }
    
    /** {@inheritDoc} */
    public function build(): string
    {
        if (is_array($this->classes) && count($this->classes) > 0) {
            $classes = " ";
            $classes .= implode(" ",$this->classes);
        } else {
            $classes = "";
        }
        
        return sprintf('
         <div class="form-control%s">
             <label class="form-label">%s</label>
             %s
         </div>
     ', $classes ,$this->label, $this->renderInput()
     );
    }
    
    /**
     * Input render
     * 
     * @return string
     */
    abstract public function renderInput(): string;
}