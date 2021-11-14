<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Mongodb\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function imageable(){
        return $this->morphTo();
    }

    public function url(){
        return Storage::url($this->path);
    }
}
