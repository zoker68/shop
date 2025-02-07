<?php

namespace Zoker\Shop\Classes;

use Exception;
use Illuminate\Database\Eloquent\Model;
use OpenAI\Laravel\Facades\OpenAI;

class AIQuery
{
    const string MODEL = 'gpt-4o-mini';

    private array $prompts = [];

    private array $query = [];

    private function getPrompts(): array
    {
        return [
            'setup' => 'You must be SEO expert. Site name ' . config('app.name') . '. Language for answers ' . config('app.locale') . '. Answer format JSON without wrapping.',
            'seo' => 'Please provide SEO friendly title and description for the following model. The title should not include the site name, it will be added after |. Answer key title, description. Title 50 char, description 200 char',
            'seo_page' => 'Please provide SEO friendly title and description for the following page. The title should not include the site name, it will be added after |. Answer key title, description. Title 50 char, description 200 char',
        ];
    }

    public static function seoTitleDescription(Model|array $model): string
    {
        if (! is_array($model)) {
            $model = $model->toArray();
        }

        $model = json_encode($model, JSON_UNESCAPED_UNICODE);

        return (new self)
            ->addPrompt('seo')
            ->addQuery($model)
            ->get();

    }

    public static function seoTitleDescriptionForMetaPage(array $model): string
    {
        $model = json_encode($model, JSON_UNESCAPED_UNICODE);

        return (new self)
            ->addPrompt('seo_page')
            ->addQuery($model)
            ->get();

    }

    private function __construct()
    {
        $this->query = [
            'model' => self::MODEL,
            'messages' => [],
        ];

        $this->prompts = array_merge($this->prompts, $this->getPrompts());

        $this->addPrompt('setup');
    }

    private function addPrompt(string $promptName): self
    {
        if (! isset($this->prompts[$promptName])) {
            throw new Exception('Prompt "' . $promptName . '" not found');
        }

        $this->query['messages'][] = [
            'role' => 'system',
            'content' => $this->prompts[$promptName],
        ];

        return $this;
    }

    private function addQuery(string $mailText): self
    {
        $this->query['messages'][] = [
            'role' => 'user',
            'content' => $mailText,
        ];

        return $this;
    }

    private function get(): string
    {
        $result = OpenAI::chat()->create($this->query);

        return (string) $result->choices[0]->message->content;
    }
}
