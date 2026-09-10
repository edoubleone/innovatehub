<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A training program offered by the Foundation.
 *
 * @property int    $id
 * @property string $slug
 * @property string $num              Two-digit ordinal ("01".."06")
 * @property string $glyph            Single-letter mark used in the visual
 * @property string $title
 * @property string $short            One-liner for cards
 * @property string $long             Full description for the detail page
 * @property string $duration
 * @property string $format
 * @property array  $skills           JSON array of skill chips
 * @property string $color            Accent hex
 * @property string $image
 * @property int    $sort_order
 */
class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'num',
        'glyph',
        'title',
        'short',
        'long',
        'duration',
        'format',
        'skills',
        'color',
        'image',
        'sort_order',
    ];

    protected $casts = [
        'skills'     => 'array',
        'sort_order' => 'integer',
    ];

    /**
     * Use the slug for route-model binding so URLs read `/programs/web`
     * instead of `/programs/1`.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function cohorts()
    {
        return $this->belongsToMany(Cohort::class)->withTimestamps();
    }

    /**
     * All applications that chose this program.
     */
    public function applications()
    {
        return $this->hasMany(Application::class, 'program_slug', 'slug');
    }
}
