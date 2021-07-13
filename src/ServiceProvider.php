<?php

namespace Bfg\Text;

use Bfg\Installer\Providers\InstalledProvider;

/**
 * Class ServiceProvider
 * @package Bfg\Text
 */
class ServiceProvider extends InstalledProvider
{
    /**
     * The name of extension.
     * @var string|null
     */
    public ?string $name = "bfg/text";

    /**
     * The description of extension.
     * @var string|null
     */
    public ?string $description = "All sorts of chips to work with the text";

    /**
     * Set as installed by default.
     * @var bool
     */
    public bool $installed = false;

    /**
     * Executed when the provider is registered
     * and the extension is installed.
     * @return void
     */
    public function installed(): void
    {
        //
    }

    /**
     * Executed when the provider run method
     * "boot" and the extension is installed.
     * @return void
     */
    public function run(): void
    {
        //
    }
}

