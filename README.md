## BenOSP(Ben Open-Source Project) FormBuilder


## Basic usage

```php
<?php
require_once '../vendor/autoload.php';

use BenOSP\FormBuilder as Form;

(new Form())

->add("text",[
    "name"     => "firstname", 
    "label"    => "First name"
])->add("text",[
    "name"     => "lastname", 
    "label"    => "Last name"
])->add("email",[
    "name"     => "email", 
    "label"    => "Address email"
])->add("password",[
    "name"     => "password", 
    "label"    => "Your password"
])->add("button",[
    "name"     => "Submit"
])->build();
```
