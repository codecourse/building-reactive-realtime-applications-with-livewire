<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public array $chunks = [];

    public int $page = 1;

    public function mount()
    {
        $this->chunks = Post::latest()->pluck('id')->chunk(10)->toArray();
    }

    public function incrementPage()
    {
        $this->page++;
    }

    public function hasMorePages()
    {
        return $this->page < count($this->chunks);
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
