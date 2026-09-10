<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A scheduled intake cohort that groups one or more programs.
 *
 * @property int    $id
 * @property string $name        Human-readable name, e.g. "Cohort 25 — Spring"
 * @property string $slug        URL-safe identifier
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string $status      upcoming | active | completed
 * @property string|null $description
 * @property int    $sort_order
 */
class Cohort extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'acceptance_deadline',
        'status',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'start_date'          => 'date',
        'end_date'            => 'date',
        'acceptance_deadline' => 'date',
        'sort_order'          => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class)->withTimestamps();
    }
}
