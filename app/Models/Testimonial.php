<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A short graduate testimonial shown on the home page.
 *
 * @property int    $id
 * @property string $quote
 * @property string $name
 * @property string $role
 * @property string $avatar_initial  Single uppercase letter for the badge
 * @property bool   $published
 * @property int    $sort_order
 */
class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'name',
        'role',
        'avatar_initial',
        'published',
        'sort_order',
    ];

    protected $casts = [
        'published'  => 'boolean',
        'sort_order' => 'integer',
    ];
}
