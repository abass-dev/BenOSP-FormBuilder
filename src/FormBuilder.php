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

namespace BenOSP;

/**
* Form builder
*
* @author Abass Ben Cheik <abass@todaysdev.com>
*/
class FormBuilder extends Configuration
{

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
    * Form builder constructor
    *
    * @param string $method
    * @param string $action
    * @param string[] $classes
    *
    * @return void
    */
    public function __construct(string $method = "post", string $action = "", array $classes = [])
    {
        $this->action = $action;
        $this->method = $method;
        $this->classes = $classes;
    }

    /**
    * Add new Html input
    *
    * @param string $types
    * @param array $params
    *
    * @return self
    */
    public function add(string $types, array $params): self
    {
        $types = "BenOSP\\Type\\".ucfirst($types."Type");
        $typeClass = new $types(
            $params["name"],
            $params["id"] ?? $params["name"],
            $params["value"] ?? "",
            $params["placeholder"] ?? ucfirst($params["name"]),
            $params["label"] ?? ucfirst($params["name"]),
            $params["feedback"] ?? "",
            $params["classes"] ?? []
        );
        
        $this->input($typeClass);
        
        return $this;
    }
    
    /**
     * Html input types
     * 
     * @param AbstractType $elements
     * @return void
     */
    public function input(AbstractType $elements): void
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
        echo sprintf(
            '
        <form method="%s" action="%s" class="mt-4 mb-4%s">
        %s
        </form>
        ',
            $this->method,
            $this->action,
            $classes,
            $content
        );
    }
}
