<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewPost extends Component
{
    public Post $post;
    public int $commentsCount = 0;

    public function mount( Post $post ): void
    {
        $this->post = $post;
        $this->post->loadCount('comments');
        $this->commentsCount = $this->post->comments_count;
    }
    #[On('comment-added')]
    // public function commentAdded( int $postId ): void
    public function commentAdded(): void
    {
        /* Simple way to increase the count */
        // $this->commentsCount++;

        /* Advanced way to increment the count, get it from db, requires dependency injection */
        // $this->post = Post::withCount('comments')->find($postId);
        // $this->commentsCount = $this->post->comments_count;

        /* Advanced way to increment the count, get it from db, no dependency injection */
        $this->post->refresh()->loadCount('comments');
        $this->commentsCount = $this->post->comments_count;
    }
    public function render(): View
    {
        return view('livewire.view-post');
    }
}
