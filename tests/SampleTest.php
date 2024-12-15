<?php

declare(strict_types=1);

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SampleTest extends WebTestCase
{
    use \Zenstruck\Foundry\Test\Factories;
    use \Zenstruck\Foundry\Test\ResetDatabase;

    public function testBug(): void
    {
        \App\Factory\AccountFactory::createOne([
            'accountSetting' => \App\Factory\AccountSettingFactory::new(),
        ]);
    }
}