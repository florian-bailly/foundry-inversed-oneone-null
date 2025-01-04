<?php

declare(strict_types=1);

namespace App\Tests;

use App\Factory\ProductFactory;
use App\Factory\ProductSettingFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SampleTest extends WebTestCase
{
    use \Zenstruck\Foundry\Test\Factories;
    use \Zenstruck\Foundry\Test\ResetDatabase;

    public function testReproducer2(): void
    {
        $foo = \App\Factory\FooFactory::createOne();

        \App\Factory\AccountFactory::createOne([
            'foo' => $foo,
            'accountSetting' => \App\Factory\AccountSettingFactory::new([
                'accountMultipleSettings' => [
                    \App\Factory\AccountMultipleSettingFactory::new(['foo' => $foo]),
                ],
            ]),
        ]);

        self::assertTrue(true);
    }

    public function testReproducer3(): void
    {
        ProductFactory::createOne([
            'productSetting' => ProductSettingFactory::new(),
        ]);

        self::assertTrue(true);
    }
}