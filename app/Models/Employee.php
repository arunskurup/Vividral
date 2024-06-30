<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
class Employee extends Model
{
    use HasFactory;
    public function Company_details()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }
}
