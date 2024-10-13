<?php

namespace Zoker\Shop\Models;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReview extends Model
{
    use HasFactory, SoftDeletes;

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
        return $query->where('published', true);
    }

    public function scopeUnpublished(Builder $query): Builder
    {
        return $query->where('published', false);
    }

    public static function getAdminFormSchema(): array
    {
        return [
            'created_at' => Placeholder::make('created_at')
                ->label(__('shop::product.reviews.admin.form.created_at'))
                ->content(fn (?ProductReview $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label(__('shop::product.reviews.admin.form.updated_at'))
                ->content(fn (?ProductReview $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            'product_id' => Select::make('product_id')
                ->columnStart(1)
                ->label(__('shop::product.reviews.admin.form.product'))
                ->relationship('product', 'name')
                ->searchable()
                ->required(),

            'user_id' => Select::make('user_id')
                ->label(__('shop::product.reviews.admin.form.user'))
                ->relationship('user', 'name')
                ->searchable(),

            'rating' => TextInput::make('rating')
                ->label(__('shop::product.reviews.admin.form.rating'))
                ->required()
                ->integer()
                ->minValue(1)
                ->maxValue(5),

            'review' => Textarea::make('review')
                ->columnSpanFull()
                ->label(__('shop::product.reviews.admin.form.review'))
                ->rows(10),

            'published' => Toggle::make('published')
                ->label(__('shop::product.reviews.admin.form.published')),
        ];
    }
}
