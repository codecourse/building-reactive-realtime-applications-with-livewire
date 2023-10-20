<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.post-item');
    }
}
