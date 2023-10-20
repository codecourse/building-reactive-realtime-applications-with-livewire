<?php

namespace App\Livewire;

use App\Events\PostUpdated;
use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditPost extends Component
{
    public Post $post;

    #[Rule('required')]
    public string $body = '';

    public function edit()
    {
        $this->authorize('update', $this->post);

        $this->validate();

        $this->post->update($this->only('body'));

        $this->dispatch('posts.' . $this->post->id . '.updated');

        broadcast(new PostUpdated($this->post->id))->toOthers();

        $this->dispatch('edit-cancel');
    }

    public function mount()
    {
        $this->fill(
            $this->post->only('body')
        );
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
