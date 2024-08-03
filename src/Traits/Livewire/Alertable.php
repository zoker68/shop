<?php

namespace Zoker\Shop\Traits\Livewire;

trait Alertable
{
    public function throwAlert(string $type, string $message, int $timeout = 2): void
    {
        $this->dispatch('livewire:alert', [
            'type' => $type,
            'message' => $message,
            'timeout' => $timeout,
        ]);
    }
}
