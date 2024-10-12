<?php

namespace Zoker\Shop\Traits\Resources;

use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Zoker\Shop\Classes\Event;

trait FormExtendable
{
    const string GENERAL_TAB = 'General';

    private static array $allFormFields = [];

    private static array $formColumns = [];

    public function addFormFields(array $fields, string $tab = self::GENERAL_TAB): void
    {
        if (! isset(self::$allFormFields[$tab])) {
            self::$allFormFields[$tab] = [];
        }

        self::$allFormFields[$tab] = array_merge(self::$allFormFields[$tab], $fields);
    }

    public function setFormColumns(int $columns, string $tab = self::GENERAL_TAB): void
    {
        self::$formColumns[$tab] = $columns;
    }

    public function removeFormField(string $name, string $tab = self::GENERAL_TAB): void
    {
        unset(self::$allFormFields[$tab][$name]);
    }

    public function removeFormFields(array $names, string $tab = self::GENERAL_TAB): void
    {
        foreach ($names as $name) {
            $this->removeFormField($name, $tab);
        }
    }

    public static function form(Form $form): Form
    {
        $instance = self::getInstance();
        $instance->presetFields();

        Event::dispatch('backend.form.extend', [$instance]);

        return $form
            ->columns($instance->getFormColumns())
            ->schema($instance->generateFormSchema());
    }

    protected function generateFormSchema(): array
    {

        if (! $this->formTabCount()) {
            return [];
        }

        if ($this->formTabCount() === 1) {
            return self::$allFormFields[self::GENERAL_TAB];
        }

        $tabs = [];

        foreach (self::$allFormFields as $tab => $fields) {
            $tabs[$tab] = Tabs\Tab::make($tab)
                ->columns($this->getFormColumns($tab))
                ->schema($fields);
        }

        return [
            Tabs::make('Tabs')
                ->tabs($tabs),
        ];
    }

    protected function formTabCount(): int
    {
        return count(self::$allFormFields);
    }

    protected function getFormColumns(?string $tab = null): int
    {
        if (! $tab && $this->formTabCount() > 1) {
            return 1;
        }

        return self::$formColumns[$tab ?? self::GENERAL_TAB] ?? 2;
    }
}
