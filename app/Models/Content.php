<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Content extends Model
{
    use HasFactory;
    protected $table = 'content';
    public $timestamps = true;

    protected $fillable =[
    	'title',
        'img',
        'description',
        'categoryId',
        'agelimit',
        'userId',
    	'create_date'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'categoryId');
    }
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'userId');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment', "contentId");
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', "contentId");
    }

    public function scopeAllowedForUser(Builder $query, $user)
    {
        if ($user && $user->enable_explicit) {
            return $query;
        }
        return $query->where('agelimit', 0);
    }
}

