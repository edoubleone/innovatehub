<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A prospective-student application submitted through the admissions form.
 *
 * @property int         $id
 * @property string      $first_name
 * @property string      $last_name
 * @property string      $email
 * @property string|null $phone
 * @property string      $program_slug    Program::slug or the literal 'unsure'
 * @property string|null $experience      'none' | 'some' | 'a_lot'
 * @property string      $why
 * @property string      $status          'received' | 'reviewing' | 'interview' | 'accepted' | 'declined'
 */
class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'program_slug',
        'cohort_id',
        'experience',
        'why',
        'status',
    ];

    protected $attributes = [
        'status' => 'received',
    ];

    /**
     * The program this applicant selected — may be null when the applicant
     * picked the "I'm not sure yet" option and `program_slug` is 'unsure'.
     */
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_slug', 'slug');
    }

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

    /**
     * Convenience accessor for the full name (useful in admin UIs).
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }
}
