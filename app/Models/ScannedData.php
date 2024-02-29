<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScannedData extends Model
{
    use HasFactory;

    protected $fillable = [
        'decoded_text'
    ];
}
