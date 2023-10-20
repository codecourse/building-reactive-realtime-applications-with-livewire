<?php

namespace App\Livewire;

use App\Events\PostDeleted;
use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    public Post $post;

    public function delete()
    {
        $this->authorize('delete', $this->post);

        Post::find($this->post->id)->delete();

        $this->dispatch('post.deleted', $this->post->id);

        broadcast(new PostDeleted($this->post->id))->toOthers();
    }

    public function render()
    {
        return view('livewire.post-item');
    }
}
