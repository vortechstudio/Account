<div class="card card-flush shadow-sm">
    <div class="card-header bg-gray-700">
        <div class="card-title">
            <span class="bullet bullet-vertical h-20px w-5px bg-warning me-5"></span> Avis & Actualités
        </div>
    </div>
    <div class="card-body">
        @foreach($articles as $article)
            <div class="d-flex flex-column mb-5">
                <span class="fs-6 text-gray-400">{{ Str::ucfirst($article->published_at->isoFormat('LL')) }} - {{ $article->author()->first()->name }}</span>
                <a href="https://{{ config('app.domain') }}/news/{{ \Illuminate\Support\Str::slug($article->title) }}" class="text-dark fw-bold"><i class="bullet bullet-dot w-7px h-7px me-2"></i> {{ $article->title }}</a>
            </div>
        @endforeach
        @if($this->news->count() > $this->limit)
            <div class="d-flex flex-center">
                <button wire:click="loadMore" class="btn btn-lg rounded-5 btn-outline btn-outline-primary w-25" wire:loading.attr="disabled">
                    <span wire:loading.class="d-none">PLUS</span>
                    <span class="d-none" wire:loading.class.remove="d-none">
                        Chargement... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        @endif
    </div>
</div>
