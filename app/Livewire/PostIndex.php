<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
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

    #[On('echo:posts,PostCreated')]
    public function prependPostFromBroadcast($payload)
    {
        $this->prependPost($payload['postId']);
    }

    #[On('echo:posts,PostDeleted')]
    public function deletePostFromBroadcast($payload)
    {
        $this->deletePost($payload['postId']);
    }

    #[On('post.deleted')]
    public function deletePost($postId)
    {
        foreach ($this->chunks as $index => $chunk) {
            if (($key = array_search($postId, $chunk)) !== false) {
                unset($this->chunks[$index][$key]);
                break;
            }
        }
    }

    #[On('post.created')]
    public function prependPost($postId)
    {
        if (empty($this->chunks)) {
            $this->chunks[] = [];
        }

        $this->chunks[0] = [$postId, ...$this->chunks[0]];
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
