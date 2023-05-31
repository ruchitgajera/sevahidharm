<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $table = 'holidays';
    protected $fillable = ['id','festival_id','name','mobile','image','address'];

    public function Festival()
    {
        return $this->hasMany('App\Models\festival','id','festival_id');
    }
}
