<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamps = true;

    protected $fillable =[
    	'title',
        'text',
        'img',
        'post_date',
        'userId'
    ];


    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'userId');
    }
}
