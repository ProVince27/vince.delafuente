<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    
    protected $table = 'cms_posts';

    protected $fillable = [
        'title',
        'slug',
        'type',
        'content',
        'featured_image',
        'post_date',
        'publicity',
    ];
    
}
