<?php

namespace Database\Seeders;

use App\Models\Cohort;
use App\Models\Program;
use Illuminate\Database\Seeder;

class CohortSeeder extends Seeder
{
    public function run(): void
    {
        $allSlugs = Program::pluck('id', 'slug');

        $cohorts = [

            // ── Upcoming ──────────────────────────────────────────────────
            [
                'name'                => 'Cohort 26 — Summer',
                'slug'                => 'cohort-26-summer',
                'status'              => 'upcoming',
                'start_date'          => '2026-07-07',
                'end_date'            => '2026-10-17',
                'acceptance_deadline' => '2026-06-01',
                'description'         => 'Our flagship summer intake. Full-time track with live sessions Mon–Fri.',
                'sort_order'          => 1,
                'programs'            => ['advanced-data-analytics', 'python-r-for-data-science', 'sql-for-data-analytics', 'data-analytics-for-beginners'],
            ],
            [
                'name'                => 'Cohort 26 — Autumn',
                'slug'                => 'cohort-26-autumn',
                'status'              => 'upcoming',
                'start_date'          => '2026-09-14',
                'end_date'            => '2027-01-09',
                'acceptance_deadline' => '2026-08-10',
                'description'         => 'Part-time autumn intake, evenings and weekends.',
                'sort_order'          => 2,
                'programs'            => ['business-data-analyst', 'business-intelligence-with-power-bi', 'the-complete-sql-certification-course'],
            ],
            [
                'name'                => 'Cohort 26 — Winter',
                'slug'                => 'cohort-26-winter',
                'status'              => 'upcoming',
                'start_date'          => '2026-11-02',
                'end_date'            => '2027-02-28',
                'acceptance_deadline' => '2026-10-01',
                'description'         => 'Compact winter cohort focused on business intelligence tools.',
                'sort_order'          => 3,
                'programs'            => ['business-intelligence-with-tableau', 'business-intelligence-with-power-bi', 'data-analysis-for-business-professionals'],
            ],
            [
                'name'                => 'Cohort 27 — Spring',
                'slug'                => 'cohort-27-spring',
                'status'              => 'upcoming',
                'start_date'          => '2027-01-18',
                'end_date'            => '2027-05-02',
                'acceptance_deadline' => '2026-12-15',
                'description'         => 'Early 2027 intake for the full data analytics track.',
                'sort_order'          => 4,
                'programs'            => ['foundational-data-analytics', 'sql-for-data-analytics', 'python-r-for-data-science', 'advanced-data-analytics'],
            ],
            [
                'name'                => 'Summer Bootcamp 2026',
                'slug'                => 'summer-bootcamp-2026',
                'status'              => 'upcoming',
                'start_date'          => '2026-06-15',
                'end_date'            => '2026-07-15',
                'acceptance_deadline' => '2026-05-31',
                'description'         => '30-day intensive programme for fast-track learners.',
                'sort_order'          => 5,
                'programs'            => ['summer-bootcamp', 'data-analytics-for-beginners'],
            ],

            // ── Active ─────────────────────────────────────────────────────
            [
                'name'                => 'Cohort 25 — Spring',
                'slug'                => 'cohort-25-spring',
                'status'              => 'active',
                'start_date'          => '2026-02-03',
                'end_date'            => '2026-05-23',
                'acceptance_deadline' => null,
                'description'         => 'Currently in session — week 12 of 16.',
                'sort_order'          => 6,
                'programs'            => ['advanced-data-analytics', 'business-data-analyst', 'sql-for-data-analytics'],
            ],
            [
                'name'                => 'Cohort 25 — Healthcare Track',
                'slug'                => 'cohort-25-healthcare',
                'status'              => 'active',
                'start_date'          => '2026-01-20',
                'end_date'            => '2026-05-10',
                'acceptance_deadline' => null,
                'description'         => 'Specialist cohort for healthcare professionals entering data roles.',
                'sort_order'          => 7,
                'programs'            => ['healthcare-data-analyst', 'data-analytics-with-excel'],
            ],
            [
                'name'                => 'Cohort 25 — AI Foundations',
                'slug'                => 'cohort-25-ai',
                'status'              => 'active',
                'start_date'          => '2026-03-10',
                'end_date'            => '2026-06-28',
                'acceptance_deadline' => null,
                'description'         => 'Cohort exploring AI and machine learning fundamentals.',
                'sort_order'          => 8,
                'programs'            => ['introduction-to-artificial-intelligence', 'python-r-for-data-science'],
            ],
            [
                'name'                => 'Cohort 25 — Business Analyst',
                'slug'                => 'cohort-25-ba',
                'status'              => 'active',
                'start_date'          => '2026-02-17',
                'end_date'            => '2026-06-06',
                'acceptance_deadline' => null,
                'description'         => 'Business analysis track combining strategy with data tools.',
                'sort_order'          => 9,
                'programs'            => ['the-business-analyst-training', 'business-data-analyst', 'business-intelligence-with-tableau'],
            ],
            [
                'name'                => 'Cohort 25 — NYSC Special',
                'slug'                => 'cohort-25-nysc',
                'status'              => 'active',
                'start_date'          => '2026-03-01',
                'end_date'            => '2026-05-31',
                'acceptance_deadline' => null,
                'description'         => 'Dedicated cohort for corps members across service states.',
                'sort_order'          => 10,
                'programs'            => ['data-analytics-with-excel-nysc', 'foundation-to-data-analytics'],
            ],

            // ── Completed ──────────────────────────────────────────────────
            [
                'name'                => 'Cohort 24 — Autumn',
                'slug'                => 'cohort-24-autumn',
                'status'              => 'completed',
                'start_date'          => '2025-09-08',
                'end_date'            => '2025-12-20',
                'acceptance_deadline' => null,
                'description'         => null,
                'sort_order'          => 11,
                'programs'            => ['advanced-data-analytics', 'sql-for-data-analytics'],
            ],
            [
                'name'                => 'Cohort 24 — Summer',
                'slug'                => 'cohort-24-summer',
                'status'              => 'completed',
                'start_date'          => '2025-07-07',
                'end_date'            => '2025-10-18',
                'acceptance_deadline' => null,
                'description'         => null,
                'sort_order'          => 12,
                'programs'            => ['python-r-for-data-science', 'data-analytics-for-beginners'],
            ],
            [
                'name'                => 'Cohort 24 — Spring',
                'slug'                => 'cohort-24-spring',
                'status'              => 'completed',
                'start_date'          => '2025-02-03',
                'end_date'            => '2025-05-24',
                'acceptance_deadline' => null,
                'description'         => null,
                'sort_order'          => 13,
                'programs'            => ['business-intelligence-with-power-bi', 'business-data-analyst'],
            ],
            [
                'name'                => 'Cohort 23 — Winter',
                'slug'                => 'cohort-23-winter',
                'status'              => 'completed',
                'start_date'          => '2024-11-04',
                'end_date'            => '2025-02-22',
                'acceptance_deadline' => null,
                'description'         => null,
                'sort_order'          => 14,
                'programs'            => ['foundational-data-analytics', 'data-analytics-with-excel'],
            ],
            [
                'name'                => 'Cohort 23 — Autumn',
                'slug'                => 'cohort-23-autumn',
                'status'              => 'completed',
                'start_date'          => '2024-09-09',
                'end_date'            => '2024-12-21',
                'acceptance_deadline' => null,
                'description'         => null,
                'sort_order'          => 15,
                'programs'            => ['healthcare-data-analyst', 'the-complete-sql-certification-course'],
            ],
        ];

        foreach ($cohorts as $data) {
            $programSlugs = $data['programs'];
            unset($data['programs']);

            $cohort = Cohort::updateOrCreate(['slug' => $data['slug']], $data);

            $programIds = collect($programSlugs)
                ->map(fn ($s) => $allSlugs[$s] ?? null)
                ->filter()
                ->values()
                ->all();

            $cohort->programs()->sync($programIds);
        }
    }
}
