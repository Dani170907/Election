<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_id',
    ];

    // Relasi ke model User
    // setiap vote dimiliki oleh satu user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Candidate
    // Setiap vote diberikan kepada satu kandidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
