<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeButton extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function toggleLike()
    {
        $user = Auth::user();

        if ($this->post->isLikedBy($user)) {
            $this->post->likes()->detach($user->id);
        } else {
            $this->post->likes()->attach($user->id);
        }

        $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.like-button', [
            'isLiked' => $this->post->isLikedBy(Auth::user()),
            'likesCount' => $this->post->likes()->count(),
        ]);
    }
}
