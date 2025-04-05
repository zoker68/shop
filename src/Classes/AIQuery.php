<?php

namespace Zoker\Shop\Classes;

use Exception;
use Illuminate\Database\Eloquent\Model;
use OpenAI\Laravel\Facades\OpenAI;

class AIQuery
{
    const string MODEL = 'gpt-4o-mini';

    protected static array $prompts = [];

    private array $query = [];

    protected function getPrompts(): array
    {
        return [
            'setup' => 'You must be SEO expert. Site name ' . config('app.name') . '. Language for answers ' . config('app.locale') . '. Answer format JSON without wrapping.',
            'seo' => 'Please provide SEO friendly title and meta description for the following model. The title should not include the site name, it will be added after |. Answer key title, description. Title 50 char, description 200 char',
            'seo_page' => 'Please provide SEO friendly title and meta description for the following page. The title should not include the site name, it will be added after |. Answer key title, description. Title 50 char, description 200 char',
            'seo_product' => 'Please provide SEO friendly title and meta description for the following product. The title should not include the site name, it will be added after |. Answer key title, description. Title 50 char, description 200 char',
        ];
    }

    public static function addPrompts(array $prompts): void
    {
        static::$prompts = array_merge(static::$prompts, $prompts);
    }

    public static function seoTitleDescription(Model|array $model): string
    {
        if (! is_array($model)) {
            $model = $model->toArray();
        }

        $model = json_encode($model, JSON_UNESCAPED_UNICODE);

        return (new self)
            ->sendPrompt('seo')
            ->addQuery($model)
            ->get();

    }

    public static function seoTitleDescriptionForMetaPage(array $model): string
    {
        $model = json_encode($model, JSON_UNESCAPED_UNICODE);

        return (new self)
            ->sendPrompt('seo_page')
            ->addQuery($model)
            ->get();
    }

    public static function seoTitleDescriptionForProduct(Model|array $model): string
    {
        if (! is_array($model)) {
            $model = $model->toArray();
        }

        $model = json_encode($model, JSON_UNESCAPED_UNICODE);

        return (new self)
            ->sendPrompt('seo_product')
            ->addQuery($model)
            ->get();
    }

    private function __construct()
    {
        $this->query = [
            'model' => self::MODEL,
            'messages' => [],
        ];

        static::$prompts = array_merge(static::$prompts, $this->getPrompts());

        $this->sendPrompt('setup');
    }

    protected function sendPrompt(string $promptName): self
    {
        if (! isset(static::$prompts[$promptName])) {
            throw new Exception('Prompt "' . $promptName . '" not found');
        }

        $this->query['messages'][] = [
            'role' => 'system',
            'content' => static::$prompts[$promptName],
        ];

        return $this;
    }

    protected function addQuery(string $mailText): self
    {
        $this->query['messages'][] = [
            'role' => 'user',
            'content' => $mailText,
        ];

        return $this;
    }

    protected function get(): string
    {
        $result = OpenAI::chat()->create($this->query);

        return (string) $result->choices[0]->message->content;
    }
}
