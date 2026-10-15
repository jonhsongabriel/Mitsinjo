<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->extension('framework', [
        'secret' => '%env(APP_SECRET)%',
        'csrf_protection' => true,
        'form' => ['csrf_protection' => true],
        'session' => true,
        'handle_all_throwables' => true,
    ]);
};