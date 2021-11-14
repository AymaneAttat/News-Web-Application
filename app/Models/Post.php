<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Builder;
use App\Models\Comment;
use App\Models\Dislike;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'url',
        'user_id'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    protected $appends = ['comments_count'];

    public function getCommentsCountAttribute() { return $this->comments->count()->orderBy('desc'); } 
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function liked(){
        return $this->hasMany(PostUser::class);
    }
     public function isAuthUserLikedPost(){
        return $this->liked()->where('user_id',  auth()->id())->exists();
    }

    public function disliked(){
        return $this->hasMany(Dislike::class);
    }
    public function isAuthUserDisLikedPost(){
        return $this->disliked()->where('user_id',  auth()->id())->exists();
    }

    protected static function boot(){
        parent::boot();

        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }
/*
    public function liked(){
        return $this->belongsToMany(PostUser::class)->withTimestamps();
    }

    public function ifliked($post, $user){
        if (PostUser::where(['post_id' => $post, 'user_id' => $user ])) {
            return true;
        }
        return false;
    }*/

    /*public function scopeMostCommented(Builder $query){
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }*/
}
