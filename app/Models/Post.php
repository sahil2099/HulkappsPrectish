<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory;
    use Sortable;
    protected $primaryKey='id';
    protected $table='post';
    protected $fillable=['title','uid'];
    public $sortable = ['title','created_at'];

    public function user(){
        return $this->belongsTo(User::class,'uid','id');
    }
}
