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
* Form builder
*
* @author Abass Ben Cheik <abass@todaysdev.com>
*/
class FormBuilder {

     /**
    * @var string
    */
    public string $action;

    /**
    * @var string
    */
    public string $method;

    /**
    * @var string[]
    */
    public array $classes = [];

    /**
    * @var string[]
    */
    public array $elements = [];

    /**
    * FormBuilder constructor
    *
    * @param string $action
    * @param string $method
    * @param string[] $classes
    *
    * @return void
    */
    public function __construct(string $action = "", string $method = "get", array $classes = []) {
        $this->action = $action;
        $this->method = $method;
        $this->classes = $classes;
    }

    /**
    * Add new Html input
    *
    * @param AbstractType $elements
    *
    * @return self
    */
    public function add(string $types, array $potions): self
    {
        $types = "BenOSP\\Type\\".ucfirst($types."Type");
        $typeClass = new $types($potions["name"], $potions["label"] ?? "");
        
        $this->input($typeClass);
        
        return $this;
    }
    
    public function input(AbstractType $elements)
    {
        $this->elements[] = $elements;
    }
    
    /**
    * Final form builder/render
    *
    * @return void
    */
    public function build(): void
    {
        if (is_array($this->classes) && count($this->classes) > 0) {
            $classes = " ";
            $classes .= implode(" ", $this->classes);
        } else {
            $classes = "";
        }
        $content = implode(PHP_EOL, array_map(fn($elements) => $elements->build(), $this->elements));
        echo sprintf('
        <form action="%s", method="%s" class="row%s">%s</form>',
            $this->action, $this->method, $classes, $content);
    }
}
