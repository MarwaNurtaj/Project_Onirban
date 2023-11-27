<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey='role_id';

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','role_creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\User','role_editor','id');
    }
}
