<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class SomeListCount extends Component
{
    #[Reactive()]
    public array $things;

    public function render()
    {
        return view('livewire.some-list-count');
    }
}
