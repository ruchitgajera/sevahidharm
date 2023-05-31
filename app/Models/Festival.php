<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;
    protected $table = 'festivals';
    protected $fillable = ['id','company_id','theme_layout_id','festival_name','slug','image','date'];

    public function company()
    {
        return $this->hasOne('App\Models\company','id','company_id');
    }

    public function holiday()
    {
        return $this->hasOne('App\Models\holiday','id','holiday_id');
    }

    public function theme_layout()
    {
        return $this->hasOne('App\Models\theme_layout','id','theme_layout_id');
    }

}
