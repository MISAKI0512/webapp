<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public function todo()
    {
        return $this->belongsTo('App\Models\Todo');
    }
}
