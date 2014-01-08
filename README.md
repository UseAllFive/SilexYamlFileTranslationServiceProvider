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

## Using translator domains (other than default)
Translator domains can be used by appending `-domain` to your translation file name.

Suppose we have an english translation file which lives at `app/translation/en.yml`. By default, the Translator service uses the `messages` domain. Ergo `app/translation/en-messages.yml` is the same as `app/translation/en.yml`

For example, if one wanted to create english [validation translations](http://symfony.com/doc/current/book/translation.html#book-translation-constraint-messages) under the `validators` domain, simply create `app/translation/en-validators.yml`
