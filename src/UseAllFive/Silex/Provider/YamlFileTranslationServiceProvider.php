<?php

namespace UseAllFive\Silex\Provider;

use Silex\Application;
use Silex\Provider\TranslationServiceProvider as SilexTranslationServiceProvider;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\Loader\YamlFileLoader;

class YamlFileTranslationServiceProvider extends SilexTranslationServiceProvider
{
    public function boot(Application $app)
    {
        parent::boot($app);

        if (!isset($app['translator.locale_dir'])) {
            throw new \Exception(
                'You must configure a translator.locale_dir paremeter'
            );
        }

        $app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
            $finder = new Finder();
            $finder->files()->name('*.yml')->in($app['translator.locale_dir']);

            $translator->addLoader('yaml', new YamlFileLoader());
            foreach ($finder as $file) {
                $baseName = $file->getBaseName('.' . $file->getExtension());
                $nameParts = explode("-", $baseName);
                $lang = $nameParts[0];
                $domain = (isset($nameParts[1])) ? $nameParts[1] : null;
                $translator->addResource(
                    'yaml',
                    $file->getRealpath(),
                    $lang,
                    $domain
                );
            }

            return $translator;
        }));
    }
}
