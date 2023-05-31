<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme_layout extends Model
{
    use HasFactory;
    Protected $table = 'theme_layouts';
    protected $fillable = ['id','theme','layout','text'];
}
