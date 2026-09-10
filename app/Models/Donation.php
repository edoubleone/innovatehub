<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'frequency',
        'first_name',
        'last_name',
        'email',
        'is_anonymous',
        'message',
        'status',
    ];

    protected $casts = [
        'amount'       => 'decimal:2',
        'is_anonymous' => 'boolean',
    ];

    protected $attributes = [
        'status'       => 'pending',
        'is_anonymous' => false,
    ];

    public function getDonorNameAttribute(): string
    {
        if ($this->is_anonymous) {
            return 'Anonymous';
        }

        return trim("{$this->first_name} {$this->last_name}") ?: 'Unknown';
    }
}
