<?php

namespace Zoker\Shop\Models;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductQuestion extends Model
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
            Placeholder::make('created_at')
                ->label(__('zoker.shop::product.questions.admin.form.created_at'))
                ->content(fn (?ProductQuestion $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            Placeholder::make('updated_at')
                ->label(__('zoker.shop::product.questions.admin.form.updated_at'))
                ->content(fn (?ProductQuestion $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            Select::make('product_id')
                ->label(__('zoker.shop::product.questions.admin.form.product'))
                ->relationship('product', 'name')
                ->searchable()
                ->required(),

            Select::make('user_id')
                ->label(__('zoker.shop::product.questions.admin.form.user'))
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            Textarea::make('question')
                ->label(__('zoker.shop::product.questions.admin.form.question'))
                ->minLength(5)
                ->rows(10)
                ->required(),

            RichEditor::make('answer')
                ->label(__('zoker.shop::product.questions.admin.form.answer')),
        ];
    }
}
