<?php

namespace Zoker\Shop\Models;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Zoker\Shop\Classes\Bases\BaseModel;

class ProductQuestion extends BaseModel
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('answer');
    }

    public function scopeUnpublished(Builder $query): Builder
    {
        return $query->whereNull('answer');
    }

    public static function getAdminFormSchema(): array
    {
        return [
            'created_at' => Placeholder::make('created_at')
                ->label(__('shop::product.questions.admin.form.created_at'))
                ->content(fn (?ProductQuestion $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label(__('shop::product.questions.admin.form.updated_at'))
                ->content(fn (?ProductQuestion $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            'product_id' => Select::make('product_id')
                ->label(__('shop::product.questions.admin.form.product'))
                ->relationship('product', 'name')
                ->searchable()
                ->required(),

            'user_id' => Select::make('user_id')
                ->label(__('shop::product.questions.admin.form.user'))
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            'question' => Textarea::make('question')
                ->label(__('shop::product.questions.admin.form.question'))
                ->minLength(5)
                ->rows(10)
                ->required(),

            'answer' => RichEditor::make('answer')
                ->label(__('shop::product.questions.admin.form.answer')),
        ];
    }
}
