<?php

namespace Zofe\ThemeSneat;

use Zofe\Rapyd\Themes\RapydThemeServiceProvider;

/** Activate with RAPYD_THEME=sneat (config rapyd.theme). */
class ThemeServiceProvider extends RapydThemeServiceProvider
{
    protected string $name = 'sneat';

    protected string $path = __DIR__ . '/..';
}
