<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationData extends Model
{
    use HasFactory;
    protected $table = 'Communications';

    public function admindata(){
        return $this->belongsTo(Admin_data::class,'admin');
    }

    public function userdata(){
        return $this->belongsTo(Admin_data::class,'user');    
    }
    
}
