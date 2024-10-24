<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostList extends Component
{
    public $posts;
    public $loadedCount = 10;
    public $hasMore = false;
    public $category = null;
    public $isFollowedPosts = false;

    public function mount($category = null, $isFollowedPosts = false)
    {
        $this->category = $category;
        $this->isFollowedPosts = $isFollowedPosts;
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $query = $this->buildQuery();
        $this->posts = $query->take($this->loadedCount)->get();
        $this->hasMore = $query->count() > $this->loadedCount;
    }

    public function loadMore()
    {
        $this->loadedCount += 20;
        $this->loadPosts();
    }

    private function buildQuery()
    {
        $query = Post::with(['user', 'category'])->orderBy('created_at', 'desc');

        if ($this->category) {
            $query->where('category_id', $this->category->id);
        }

        if ($this->isFollowedPosts) {
            $followedUserIds = Auth::user()->following()->pluck('users.id');
            $query->whereIn('user_id', $followedUserIds);
        }

        return $query;
    }

    public function render()
    {
        return view('livewire.post-list', [
            'currentUserId' => Auth::id(),
        ]);
    }
}
