## BenOSP(Ben Open-Source Project) FormBuilder


## Basic usage

```php
<?php
require_once '../vendor/autoload.php';

use BenOSP\FormBuilder as Form;

(new Form())

->add('text', [
   'name' => "subject",
   "label" => "📝"

])->add("text", [
    "name" => "level",
    "label" => "📶"
    
])->add("dateTime", [
    "name" => "createdAt",
    "label" => "📆"

])->add("submit", ["name" => "➕"]);
```