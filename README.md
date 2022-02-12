## BenOSP(Ben Open-Source Project) FormBuilder

<a href="https://packagist.org/packages/benosp/formbuilder" title="version"><img src="https://img.shields.io/packagist/v/benosp/formbuilder.svg?style=flat-square"/></a>
<a href="https://github.com/abass-bencheik/BenOSP-FormBuilder/blob/master/LICENSE" title="license"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square"/></a>

## Installation
```bash
$ composer require benosp/formbuilder
```
## Basic usage
```<?php
require_once './vendor/autoload.php';

$form = (new \BenOSP\FormBuilder)

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

])->buildAssets("assets/bootstrap/");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form builder</title>
  <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
 </head>
    <body class="container">
        <?php $form->build() ?>
    </body>
</html>

```
***NOTE** You can delete the method below after running the script for the first time. This is to build the bootstrap script in the public/assets/ folder for example
```php
buildAssets("assets/");
```
This form builder was already tested on the nigatedev framework [to-do demo](https://nigatedev.herokuapp.com/todo)
