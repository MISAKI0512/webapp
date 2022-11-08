<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');

    public function getTitle()
    {return $this;
    }
    public function author()
    {return $this->belongsTo('App\Models\Todo');
}