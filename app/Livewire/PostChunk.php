<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostChunk extends Component
{
    public array $ids;

    public function render()
    {
        return view('livewire.post-chunk', [
            'posts' => Post::whereIn('id', $this->ids)
                ->orderByRaw("FIELD(id, " . implode(',', $this->ids) . ")")
                ->get()
        ]);
    }
}
