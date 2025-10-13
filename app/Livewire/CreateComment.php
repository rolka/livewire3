<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComment extends Component
{
    public Post $post;

    #[Validate('required', onUpdate: false)]
    public string $body = '';

    public function save()
    {
        $this->validate();
        $this->post->comments()->create([
            'body' => $this->body,
        ]);
        $this->dispatch('comment-added');
        // $this->dispatch('comment-added', $this->post->id);
        $this->reset('body');
    }

    public function render(): View
    {
        return view('livewire.create-comment');
    }
}
