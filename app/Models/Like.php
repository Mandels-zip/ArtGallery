<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'liked';
    public $timestamps = true;

    protected $fillable =[
    	'contentId',
        'UserId',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'UserId');
    }

    public function content()
    {
    	return $this->belongsTo('App\Models\Content', 'contentId');
    }

}
