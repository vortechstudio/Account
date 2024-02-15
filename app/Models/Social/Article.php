<?php

namespace App\Models\Social;

use App\Enums\Social\ArticleTypeEnum;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Categorizable\Traits\Categorizable;
use Pharaonic\Laravel\Sluggable\Sluggable;

class Article extends Model
{
    use Categorizable, Sluggable;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
        'publish_social_at' => 'datetime',
        'type' => ArticleTypeEnum::class,
    ];

    protected $sluggable = 'title';

    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function cercle()
    {
        return $this->belongsTo(Cercle::class);
    }
}
