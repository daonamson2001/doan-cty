<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        "name_departments",
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->hasMany(User::class, 'id_dpms', 'id');
    }
}