<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Image;
use App\Models\Post;
//use Carbon\Carbon;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = ['email_verified_at'];

    /*protected $datestamp = ['created_at'];

    public function getcreatedAtAttribute($value){
        //$createdAt = Carbon::parse($value);
        $this->attributes['created_at'] = Carbon::parse($value)->format('M d Y');
        return $this->attributes['created_at']->format('M d Y');
    }*/
    

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    /*public function likedPosts(){
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
    

    public function like(){
        return $this->hasMany('App\Like');
    }
    */
}
