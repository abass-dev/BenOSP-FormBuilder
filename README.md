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
require_once '../vendor/autoload.php';

use BenOSP\FormBuilder as Form;

$form = (new Form())

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
## Additional CSS framework
At the moment only bootstrap is available.
By installing benosp/formbuilder you already have bootstrap installed somewhere in your project.

But you have to tell the formbuilder where you want to build your assets by creating a configuration file 
in the root of your project create a file with the name ```bash benosp-config.json ```
then copy and paste the code below, modify it as you wish

```json
{
	"public-dir":"public/",
	"assets-dir":"assets/",
	"styles":"bootstrap"
}
```

The next is to build the assets

#### Run the following command to build assets
```bash
$ ./vendor/bin/benosp build
```

Then link to the CSS or JS

```html
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form builder</title>
  <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
  <script src="assets/dist/js/bootstrap.min.js"></script>
</head>
```