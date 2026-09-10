<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'quote'          => "I came from a hospitality job I loved but couldn't grow in. Eighteen months later I'm a software engineer at a fintech. Innovate Hub didn't just teach me to code — they taught me to advocate for myself.",
                'name'           => 'Amara Okonkwo',
                'role'           => 'Software Engineer · Ramp',
                'avatar_initial' => 'A',
                'sort_order'     => 1,
            ],
            [
                'quote'          => "What made the difference was the mentorship. Real engineers reviewing my code, telling me hard truths. That's what you can't get from a bootcamp promising you the moon.",
                'name'           => 'Diego Mendes',
                'role'           => 'Data Analyst · Shopify',
                'avatar_initial' => 'D',
                'sort_order'     => 2,
            ],
            [
                'quote'          => "I was a stay-at-home parent for nine years. Innovate Hub met me where I was, and helped me find work that fits around my family. The community is why I stayed.",
                'name'           => 'Priya Rao',
                'role'           => 'Product Designer · Notion',
                'avatar_initial' => 'P',
                'sort_order'     => 3,
            ],
            [
                'quote'          => "I tried two other programs and dropped out of both. Innovate Hub was the first place that held me accountable — not in a punishing way, but in a 'we believe you can do this' way. I shipped my first production feature six weeks after graduating.",
                'name'           => 'Kwame Asante',
                'role'           => 'Backend Engineer · Linear',
                'avatar_initial' => 'K',
                'sort_order'     => 4,
            ],
            [
                'quote'          => "Coming from Nigeria with no US network, I thought breaking into tech here would be impossible. My cohort became my network. Three of us got jobs at the same company.",
                'name'           => 'Chisom Eze',
                'role'           => 'Frontend Engineer · Vercel',
                'avatar_initial' => 'C',
                'sort_order'     => 5,
            ],
            [
                'quote'          => "I was a warehouse supervisor. I applied on a whim and nearly dropped out in week two. By week ten I was the one helping other students debug. I never imagined I'd be that person.",
                'name'           => 'Marcus Webb',
                'role'           => 'Full-Stack Developer · Gusto',
                'avatar_initial' => 'M',
                'sort_order'     => 6,
            ],
            [
                'quote'          => "The curriculum was harder than I expected, and that's exactly what made it worth it. No hand-holding, no pretend projects. Real work from day one.",
                'name'           => 'Fatima Al-Hassan',
                'role'           => 'Data Engineer · Stripe',
                'avatar_initial' => 'F',
                'sort_order'     => 7,
            ],
            [
                'quote'          => "I'd been unemployed for 14 months when I applied. I wasn't sure I still had it in me to learn something new. Innovate Hub proved me wrong about myself.",
                'name'           => 'Jordan Osei',
                'role'           => 'QA Engineer · Figma',
                'avatar_initial' => 'J',
                'sort_order'     => 8,
            ],
            [
                'quote'          => "The career support didn't end at graduation — they kept checking in, prepped me for every interview round, and celebrated with me when I got the offer. That ongoing care is rare.",
                'name'           => 'Sofia Reyes',
                'role'           => 'Product Manager · Atlassian',
                'avatar_initial' => 'S',
                'sort_order'     => 9,
            ],
            [
                'quote'          => "I was skeptical of anything free — I assumed there was a catch. There wasn't. What there was, was a genuine investment in my success from people who didn't need to care but clearly did.",
                'name'           => 'Tunde Okafor',
                'role'           => 'Cloud Engineer · AWS',
                'avatar_initial' => 'T',
                'sort_order'     => 10,
            ],
            [
                'quote'          => "I'm autistic, and a lot of environments have been hard for me. The cohort format and the written-first communication style here just worked. I graduated top of my cohort.",
                'name'           => 'Lily Chen',
                'role'           => 'Software Engineer · GitHub',
                'avatar_initial' => 'L',
                'sort_order'     => 11,
            ],
            [
                'quote'          => "My previous job paid $28k a year. I now earn $95k as a data analyst. That's not just a raise — that's a different life for my kids.",
                'name'           => 'Rafael Dominguez',
                'role'           => 'Data Analyst · Airbnb',
                'avatar_initial' => 'R',
                'sort_order'     => 12,
            ],
            [
                'quote'          => "I came in expecting a course. I left with a career, a set of mentors I still call on today, and the confidence to keep growing. The program ends; the community doesn't.",
                'name'           => 'Aisha Mwangi',
                'role'           => 'UX Researcher · Google',
                'avatar_initial' => 'A',
                'sort_order'     => 13,
            ],
        ];

        foreach ($rows as $row) {
            Testimonial::updateOrCreate(
                ['name' => $row['name']],
                $row + ['published' => true],
            );
        }
    }
}
