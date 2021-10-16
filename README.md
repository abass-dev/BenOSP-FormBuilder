## BenOSP(Ben Open-Source Project) FormBuilder

<a href="https://packagist.org/packages/benosp/formbuilder" title="version"><img src="https://img.shields.io/packagist/v/benosp/formbuilder.svg?style=flat-square"/></a>
<a href="https://github.com/abass-bencheik/BenOSP-FormBuilder/blob/master/LICENSE" title="license"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square"/></a>

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