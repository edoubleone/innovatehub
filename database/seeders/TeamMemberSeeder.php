<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Maya Alves',     'role' => 'Founder & Executive Director', 'image' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80&auto=format&fit=crop', 'sort_order' => 1],
            ['name' => 'Jordan Park',    'role' => 'Head of Admissions',           'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&q=80&auto=format&fit=crop', 'sort_order' => 2],
            ['name' => 'Samuel Adeyemi', 'role' => 'Director of Curriculum',       'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600&q=80&auto=format&fit=crop', 'sort_order' => 3],
            ['name' => 'Lena Kowalski',  'role' => 'Head of Career Services',      'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=600&q=80&auto=format&fit=crop', 'sort_order' => 4],
        ];

        foreach ($rows as $row) {
            TeamMember::updateOrCreate(['name' => $row['name']], $row);
        }
    }
}
