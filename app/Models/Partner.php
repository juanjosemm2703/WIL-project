<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'user_id';
    
    use HasFactory;
    
    protected $fillable = [
        'approved',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function projects(){
        return $this->hasMany(Project::class, 'partner_id', 'user_id');
    }
}
