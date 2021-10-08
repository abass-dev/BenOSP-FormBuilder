## BenOSP(Ben Open-Source Project) FormBuilder


## Basic usage

```php
<?php
require_once '../vendor/autoload.php';

use BenOSP\FormBuilder;
use BenOSP\Type\{ TextType, EmailType, PasswordType, ButtonType };

$form = new FormBuilder();
$form->add(new TextType("firstname", "First name"));
$form->add(new TextType("lastname", "Last name"));
$form->add(new EmailType("email", "Your email"));
$form->add(new PasswordType("password", "Your password"));
$form->add(new ButtonType("Submit"))->build();
```
