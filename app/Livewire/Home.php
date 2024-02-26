<?php

namespace App\Livewire;

use App\Enums\Social\ArticleTypeEnum;
use App\Models\Social\Article;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    public $news;
    public $limit = 5;

    public function mount()
    {
        $this->news = Article::with('author', 'cercle')
            ->where('type', ArticleTypeEnum::SSO)
            ->where('published', true)
            ->orderBy('published_at', 'desc')
            ->get();
    }
    public function loadMore()
    {
        $this->limit += 5;
    }

    #[Title("Bienvenue")]
    public function render()
    {
        $news = Article::with('author', 'cercle')
            ->where('type', ArticleTypeEnum::SSO)
            ->where('published', true)
            ->orderBy('published_at', 'desc')
            ->paginate($this->limit);
        //dd($this->news);
        return view('livewire.home', [
            "articles" => $news
        ])->layout('components.layouts.app');
    }
}
