<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{   
    use softDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'title','content','category_id','featured','slug','price','availability'
    ];
    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

   public function category(){
       return $this->belongsTo('App\Category');
   }

   public function tags(){
    return $this->belongsToMany('App\Tag');
}
}
