<?php

namespace App\Livewire;

use App\Events\PostDeleted;
use App\Events\PostLiked;
use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    public Post $post;

    protected $listeners = [
        'posts.{post.id}.updated' => '$refresh',
        'echo:posts.{post.id},PostUpdated' => '$refresh',
        'echo:posts.{post.id},PostLiked' => '$refresh'
    ];

    public function like()
    {
        $this->post->increment('likes');

        broadcast(new PostLiked($this->post->id))->toOthers();
    }

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
