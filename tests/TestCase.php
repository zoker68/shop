<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withMiddleware(\Illuminate\Session\Middleware\StartSession::class);
        $this->withMiddleware(\Illuminate\View\Middleware\ShareErrorsFromSession::class);
    }
}
