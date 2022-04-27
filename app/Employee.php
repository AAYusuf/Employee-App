<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // protected $fillable = [
    //     'first_name', 'last_name'
    // ];
    protected $guarded = ['id'];
    
    protected $table = 'employee';
    public function supervisor(){
        return $this->hasMany('App\Employee','');
    }
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
 