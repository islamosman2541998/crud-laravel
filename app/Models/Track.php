<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'location', 'super_v', 'logo'
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
