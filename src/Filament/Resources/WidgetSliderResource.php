<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\WidgetSliderResource\Pages;
use Zoker\Shop\Models\WidgetSlide;

class WidgetSliderResource extends Resource
{
    protected static ?string $model = WidgetSlide::class;

    protected static ?string $slug = 'widget-sliders';

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationGroup = 'Widgets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?WidgetSlide $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?WidgetSlide $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                Group::make([
                    TextInput::make('code')
                        ->label('Slider Code')
                        ->helperText('Code for slider. Combine several slides.')
                        ->required(),

                    TextInput::make('heading')
                        ->label('Heading')
                        ->maxValue(255),

                    TextInput::make('button')
                        ->label('Button text')
                        ->maxValue(255),

                    TextInput::make('link')
                        ->label('URL')
                        ->maxValue(255)
                        ->url(),

                    Select::make('target')
                        ->label('Link Target')
                        ->selectablePlaceholder(false)
                        ->options([
                            '_self' => '_self',
                            '_blank' => '_blank',
                            '_parent' => '_parent',
                            '_top' => '_top',
                        ]),
                ])->columnStart(1),

                Group::make([
                    RichEditor::make('text')
                        ->label('Text'),

                    FileUpload::make('image')
                        ->label('Background Image')
                        ->image()
                        ->directory('widget-sliders')
                        ->maxSize(10 * 1024)
                        ->imageEditor()
                        ->imageEditorAspectRatios(config('shop.widgets.slider.image_ratio')),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('code')
            ->columns([
                ImageColumn::make('image')
                    ->label('Background Image')
                    ->square(),

                TextColumn::make('heading')
                    ->label('Slider content')
                    ->wrap()
                    ->description(fn (?WidgetSlide $record): string => \Str::limit(strip_tags($record?->text)) ?? '-'),

                TextColumn::make('button')
                    ->label('Button')
                    ->description(fn (?WidgetSlide $record): string => $record?->link ?? '-'),

            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWidgetSliders::route('/'),
            'create' => Pages\CreateWidgetSlider::route('/create'),
            'edit' => Pages\EditWidgetSlider::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
