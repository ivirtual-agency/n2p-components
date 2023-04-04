<?php

namespace iVirtual\Net2phone;

use BladeUI\Icons\Factory;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Net2phoneServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the net2phone service provider.
     * 
     * @link https://github.com/spatie/laravel-package-tools
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('net2phone')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasTranslations()
            ->hasMigrations('2023_01_03_000000_create_blog_tables')
            ->runsMigrations()
            ->hasViewComposer('*', fn ($view) => $view->with(
                'internationalSites',
                Net2phone::getInternationalWebsites()
            ))
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishAssets();
            });
    }

    /**
     * The package has been registered.
     */
    public function packageRegistered(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add(
                'n2p',
                array_merge(['path' => __DIR__ . '/../resources/svg'], ['prefix' => 'n2p'])
            );
        });
    }

    /**
     * The package has been booted.
     */
    public function packageBooted(): void
    {
        Blade::anonymousComponentPath(
            __DIR__ . '/../resources/views/components',
            'n2p'
        );

        OpenGraph::setSiteName(config('app.name'));

        if (!empty(config('net2phone.social.twitter.site'))) {
            TwitterCard::setSite(config('net2phone.social.twitter.site'));
        }
    }
}
