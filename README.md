## BenOSP(Ben Open-Source Project) FormBuilder

<a href="https://packagist.org/packages/benosp/formbuilder" title="version"><img src="https://img.shields.io/packagist/v/benosp/formbuilder.svg?style=flat-square"/></a>
<a href="https://github.com/abass-bencheik/BenOSP-FormBuilder/blob/master/LICENSE" title="license"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square"/></a>

## Installation
```bash
$ composer require benosp/formbuilder
```
## Basic usage

```php
<?php
require_once 'path/to/vendor/autoload.php';

use BenOSP\FormBuilder as Form;

$form = (new Form("get", "", ["card"]))

->add('text', [
   'name' => "subject",
   "label" => "📝"

])->add("text", [
    "name" => "level",
    "label" => "📶"
    
])->add("dateTime", [
    "name" => "createdAt",
    "label" => "📆"

])->add("submit",[
    "name" => "➕"

])->buildAssets("assets/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form builder</title>
  <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
 </head>
    <body class="container">
        <?php $form->build() ?>
    </body>
</html>

```
***NOTE:**
You can delete the below method after you run the script for the first time it's for building bootstrap script
into assets/ folder.

```php
buildAssets("assets/");
```