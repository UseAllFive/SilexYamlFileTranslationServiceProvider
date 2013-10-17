# YamlFileTranslationServiceProvider
The *YamlFileTranslationServiceProvider* is an extension of [TranslationServiceProvider](http://silex.sensiolabs.org/doc/providers/translation.html)
that takes a directory, and loads all of the language yml files in a given
directory.


## Parameters
* **translator.locale_dir**: The directory containing your language yaml files.


## Registering
```php
$app->register(
    new UseAllFive\Silex\Provider\YamlFileTranslationServiceProvider(),
    array(
        'translator.locale_dir' => __DIR__.'/translations',
    )
);
```
