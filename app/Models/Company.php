<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory; 
    protected $table = 'companies';
    protected $fillable = ['id','theme_layout_id','company_name','address','slug'];

    public function theme_layout()
    {
        return $this->hasOne('App\Models\theme_layout','id','theme_layout_id');
    }
}
