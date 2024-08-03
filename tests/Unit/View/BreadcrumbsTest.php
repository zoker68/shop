<?php

namespace Tests\Unit\View;

use App\View\Components\Partials\Breadcrumbs;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class BreadcrumbsTest extends TestCase
{
    public static function data(): array
    {
        return [
            ['', []],
            ['test', [
                ['title' => 'Index', 'url' => 'http://localhost'],
                ['title' => 'test'],
            ]],
            [
                [
                    ['title' => 'test', 'url' => 'http://localhost/test'],
                ],
                [
                    ['title' => 'Index', 'url' => 'http://localhost'],
                    ['title' => 'test', 'url' => 'http://localhost/test'],
                ],
            ],
            [
                [
                    ['title' => 'test', 'url' => 'http://localhost/test'],
                    ['title' => 'test2', 'url' => 'http://localhost/2test'],
                ],
                [
                    ['title' => 'Index', 'url' => 'http://localhost'],
                    ['title' => 'test', 'url' => 'http://localhost/test'],
                    ['title' => 'test2', 'url' => 'http://localhost/2test'],
                ],
            ],
        ];
    }

    #[DataProvider('data')]
    public function test_constructor($input, $expected)
    {
        $component = new Breadcrumbs($input);
        $this->assertEquals($expected, $component->getBreadcrumbs());
    }
}
