<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'comment';
    protected $fillable = ['comment', 'pid', 'uid'];

    public function post()
    {
        return $this->belongsToMany(Post::class,'post','pid','id');
    }
}
