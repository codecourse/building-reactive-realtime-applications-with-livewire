<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePost extends Component
{
    #[Rule('required', message: 'You need a post body')]
    public string $body = '';

    public function create()
    {
        $this->validate();

        $post = request()->user()->posts()->create($this->only('body'));

        $this->dispatch('post.created', $post->id);

        $this->reset('body');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
