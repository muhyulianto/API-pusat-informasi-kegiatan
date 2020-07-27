<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function artikel() {
        return $this->belongsToMany('App\Artikel')->withTimestamps();
    }
}
