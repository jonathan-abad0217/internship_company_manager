<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    //database name
    protected $table = 'companies';

    protected $primaryKey = 'id';
    
    protected $fillable = ['name','email','image','website'];


    //companies has many employees
    public function employees(){
        return $this->hasMany(Employees::class, 'company_id', 'id');
    }
}
