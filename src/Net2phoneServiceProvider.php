<?php

namespace iVirtual\Net2phone;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasViewComposer('*', fn ($view) => $view->with(
                'internationalSites',
                Net2phone::getInternationalWebsites()
            ))
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishAssets();
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
    }
}
