<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['id', 'first_name', 'last_name', 'contact_number', 'email', 'hobby_id', 'category_id', 'status'];
    
    use HasFactory;

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }
}								

