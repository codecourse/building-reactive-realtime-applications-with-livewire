<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class SomeList extends Component
{
    public array $things = [];

    public function addThing()
    {
        $this->things[] = Str::random(10);
    }

    public function render()
    {
        return view('livewire.some-list');
    }
}
