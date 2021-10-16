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
    public string $id;
    
    /**
     * @var string
     */
    public string $label;
    
    /**
     * @var string
     */
    public string $value;
    
    /**
     * @var string
     */
    public string $feedback;
    
    
    /**
     * @var string
     */
    public string $placeholder;
    
    /**
     * @var string[]
     */
    public array $classes = [];
    
    /**
     * Html base inputs constructor
     *
     * @pram string $name          input name value
     * @pram string $id            input id value
     * @pram string $label         input label value
     * @pram string $placeholder   input placeholder value
     * @pram string $value         input value value
     * @pram string $feedback      feedback
     * @pram string[] $classes     css classes
     *
     * @return void
     */
    public function __construct(
        string $name = "",
        string $id = "",
        string $value = "",
        string $placeholder = "",
        string $label = "",
        string $feedback = "",
        array $classes = []
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->feedback = $feedback;
        $this->classes = $classes;
    }
    
    /** {@inheritDoc} */
    public function build(): string
    {
        return sprintf(
            '
         <div class="form-group">
            <div class="text-danger feedback">%s</div>
            <div class="input-group mb-3">
                <label for="%s" class="input-group-text">%s</label>
                %s
            </div>
        </div>
       ',
            $this->feedback,
            $this->id,
            $this->label,
            $this->renderInput()
        );
    }
    
    /**
     * Input render
     *
     * @return string
     */
    abstract public function renderInput(): string;
}
