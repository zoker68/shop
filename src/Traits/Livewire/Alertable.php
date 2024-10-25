<?php

namespace Zoker\Shop\Traits\Livewire;

trait Alertable
{
    public function throwAlert(string $type, string $message, ?int $timeout = null): void
    {
        if (! $timeout) {
            $timeout = match ($type) {
                'danger', 'warning' => 3,
                'error' => 5,
                default => 2,
            };
        }

        $this->dispatch('livewire:alert', [
            'type' => $type,
            'message' => $message,
            'timeout' => $timeout,
        ]);
    }
}
