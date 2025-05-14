<?php

namespace Ehabtalaat\Upayment;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io): void
    {
        $io->write("<info>UPayment plugin activated!</info>");
        // You can hook into Composer here or register event subscribers
    }

    // Optional, but good practice
    public function deactivate(Composer $composer, IOInterface $io): void
    {
        $io->write("<info>UPayment plugin deactivated.</info>");
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
        $io->write("<info>UPayment plugin uninstalled.</info>");
    }
}
