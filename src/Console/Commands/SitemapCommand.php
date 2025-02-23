<?php

namespace Zoker\Shop\Console\Commands;

use Illuminate\Console\Command;
use Route;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Zoker\FilamentStaticPages\Models\Page;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;

class SitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap';

    private $sitemap;

    public function handle(): void
    {
        $this->sitemap = SitemapGenerator::create(config('app.url'))->getSitemap();
        $this->sitemap->add(
            Url::create('/')
        );

        $this->pages();

        $this->sitemap->add(Category::published()->get());

        $this->sitemap->add(Product::published()->get());

        $this->sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated');
    }

    private function pages(): void
    {
        foreach (Page::getAllRoutes() as $route) {
            if (! $route) {
                continue;
            }
            $this->sitemap->add(
                Url::create(route('fsp.' . $route))
                    ->setLastModificationDate(now())
            );
        }

        $this->sitemap->add(
            Url::create(route('login'))
        );

        $this->sitemap->add(
            Url::create(route('forgot-password'))
        );

        if (Route::has('register')) {
            $this->sitemap->add(
                Url::create(route('register'))
                    ->setPriority(0.1)
            );
        }
    }
}
