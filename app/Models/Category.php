<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = true;

    protected $fillable =[
    	'name',
        'img',
    ];

    public function content(){
    	return $this->hasMany('App/Models/Content');
    }

}
