<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeReview extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'status', 'ai_response', 'webhook_url','student_id'];
}
