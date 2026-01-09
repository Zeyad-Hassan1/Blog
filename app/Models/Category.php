<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','created_by'];

    public function userData(){
        return $this->belongsTo(User::class , 'created_by' );
    }
}
