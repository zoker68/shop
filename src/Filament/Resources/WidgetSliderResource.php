<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\WidgetSliderResource\Pages;
use Zoker\Shop\Models\WidgetSlide;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class WidgetSliderResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = WidgetSlide::class;

    protected static ?string $slug = 'widget-sliders';

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationGroup = 'Widgets';

    public function presetForm(): void
    {
        $this->setFormColumns(3);
        $this->addFormFields([
            'created_at' => Placeholder::make('created_at')
                ->label('Created Date')
                ->content(fn (?WidgetSlide $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label('Last Modified Date')
                ->content(fn (?WidgetSlide $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            'code' => TextInput::make('code')
                ->label('Slider Code')
                ->helperText('Code for slider. Combine several slides.')
                ->required()
                ->columnStart(1),

            'heading' => TextInput::make('heading')
                ->label('Heading')
                ->maxValue(255)
                ->columnSpan(2),

            'button' => TextInput::make('button')
                ->label('Button text')
                ->maxValue(255)
                ->columnStart(1),

            'link' => TextInput::make('link')
                ->label('URL')
                ->maxValue(255)
                ->url(),

            'target' => Select::make('target')
                ->label('Link Target')
                ->selectablePlaceholder(false)
                ->options([
                    '_self' => '_self',
                    '_blank' => '_blank',
                    '_parent' => '_parent',
                    '_top' => '_top',
                ]),

            'text' => RichEditor::make('text')
                ->label('Text')
                ->columnStart(1)
                ->columnSpan(2),

            'image' => FileUpload::make('image')
                ->label('Background Image')
                ->image()
                ->directory('widget-sliders')
                ->maxSize(10 * 1024)
                ->imageEditor()
                ->imageEditorAspectRatios(config('shop.widgets.slider.image_ratio')),

        ]);
    }

    public function presetList(): void
    {
        $this->setListDefaultGroup('code');

        $this->addListColumns([
            'image' => ImageColumn::make('image')
                ->label('Background Image')
                ->square(),

            'heading' => TextColumn::make('heading')
                ->label('Slider content')
                ->wrap()
                ->description(fn (?WidgetSlide $record): string => \Str::limit(strip_tags($record?->text)) ?? '-'),

            'button' => TextColumn::make('button')
                ->label('Button')
                ->description(fn (?WidgetSlide $record): string => $record?->link ?? '-'),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ], self::ACTION_MAIN_GROUP);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
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
