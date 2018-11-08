# LangJson

Manage translations in Laravel json lang files, No DB table, direct transformation in the json files


## Installation

This packages requires Spatie/Analytics for the charts
You can install the package via composer:
``` bash
$ composer require maksuco/LangJson --dev
```
This Package works with auto discovery in Laravel +5.5, but is compatible with older versions

Install the config file and edit the info acording to your project
```
php artisan vendor:publish --provider="Maksuco\LangJson\LangJsonServiceProvider"
```
1. Open the config/langjson.php file and edit the admnistrator user id.
2. Define the lang files you have in your project.


## Usage
Now just visit yourprojectname/langjson

make sure your login with the user id you define in the config file


