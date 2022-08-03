<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

//database name for employees
protected $table = 'company_employees';

protected $primaryKey = 'id';

protected $fillable = ['employee_first_name','employee_last_name','company_id','email','phone'];

protected $hidden = ['created_at', 'updated_at'];
//employees belong to companies
public function companies(){
    return $this->belongsTo(Companies::class, 'company_id', 'id' );
}
}