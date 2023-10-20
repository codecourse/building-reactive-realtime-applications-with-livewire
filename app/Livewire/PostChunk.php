<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class PostChunk extends Component
{
    public int $chunk;

    // #[Reactive()]
    public array $ids;

    #[On('chunk.{chunk}.prepend')]
    public function prependToChunk($postId)
    {
        $this->ids = [$postId, ...$this->ids];
    }

    #[On('chunk.{chunk}.delete')]
    public function deleteFromChunk($index)
    {
        unset($this->ids[$index]);
    }

    public function render()
    {
        return view('livewire.post-chunk', [
            'posts' => Post::whereIn('id', $this->ids)
                ->orderByRaw("FIELD(id, " . implode(',', $this->ids) . ")")
                ->get()
        ]);
    }
}
