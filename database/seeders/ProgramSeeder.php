<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'slug' => 'digital-skills-technology', 'num' => '01', 'glyph' => 'D',
                'title' => 'Digital Skills & Technology',
                'short' => 'Preparing communities for the digital economy through practical technology education.',
                'long'  => 'We expand access to practical technology education and digital skills that help individuals participate confidently in today\'s economy. Our goal: increase digital capability and access to technology-driven opportunities.',
                'duration' => 'Ongoing',
                'format'   => 'Community · In-Person & Online',
                'skills'   => ['Digital Literacy', 'Data Analytics', 'Data Science', 'Data Engineering', 'Artificial Intelligence', 'Machine Learning', 'SQL', 'Python', 'Power BI', 'Tableau'],
                'color'    => '#1D4ED8',
                'image'    => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80&auto=format&fit=crop',
                'sort_order' => 1,
            ],
            [
                'slug' => 'workforce-career-development', 'num' => '02', 'glyph' => 'W',
                'title' => 'Workforce & Career Development',
                'short' => 'Connecting skills to careers through training, mentorship, and employer engagement.',
                'long'  => 'Skills become more valuable when they lead to opportunity. We help individuals prepare for employment, career advancement, and changing workforce demands through practical training, career development, mentorship, and employer engagement. Our goal: help people move from learning to opportunity.',
                'duration' => 'Ongoing',
                'format'   => 'Community · In-Person & Online',
                'skills'   => ['Career Readiness', 'Professional Development', 'Resume Development', 'Interview Preparation', 'Career Coaching', 'Mentorship', 'Employer Connections'],
                'color'    => '#F59E0B',
                'image'    => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80&auto=format&fit=crop',
                'sort_order' => 2,
            ],
            [
                'slug' => 'youth-stem', 'num' => '03', 'glyph' => 'Y',
                'title' => 'Youth & STEM',
                'short' => 'Introducing young people to technology, innovation, and future careers.',
                'long'  => 'Young people deserve early access to technology, innovation, mentorship, and career possibilities. Our youth initiatives introduce students to STEM, artificial intelligence, technology, entrepreneurship, leadership, and emerging careers. Our goal: help young people discover, develop, and lead.',
                'duration' => 'Ongoing',
                'format'   => 'Community · In-Person',
                'skills'   => ['STEM Education', 'Coding', 'AI Education', 'Innovation Challenges', 'Career Exploration', 'Entrepreneurship', 'Leadership Development'],
                'color'    => '#111827',
                'image'    => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&q=80&auto=format&fit=crop',
                'sort_order' => 3,
            ],
            [
                'slug' => 'education-lifelong-learning', 'num' => '04', 'glyph' => 'E',
                'title' => 'Education & Lifelong Learning',
                'short' => 'Making relevant, practical learning accessible beyond the classroom.',
                'long'  => 'Education should not end with a classroom or a degree. We provide practical learning opportunities that help individuals develop skills relevant to education, employment, entrepreneurship, and personal growth. Our goal: make lifelong learning accessible and practical.',
                'duration' => 'Ongoing',
                'format'   => 'Community · In-Person & Online',
                'skills'   => ['Technology Training', 'Digital Literacy', 'Community Workshops', 'Skills Bootcamps', 'Career Education', 'Leadership Development'],
                'color'    => '#1D4ED8',
                'image'    => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1200&q=80&auto=format&fit=crop',
                'sort_order' => 4,
            ],
            [
                'slug' => 'entrepreneurship-economic-empowerment', 'num' => '05', 'glyph' => 'E',
                'title' => 'Entrepreneurship & Economic Empowerment',
                'short' => 'Helping people turn ideas into sustainable businesses and income.',
                'long'  => 'Every community has entrepreneurs, creators, and problem-solvers. We support individuals who want to build businesses, develop ideas, create income, and contribute to local economic growth. Our goal: equip people to build, earn, and create opportunity.',
                'duration' => 'Ongoing',
                'format'   => 'Community · In-Person & Online',
                'skills'   => ['Entrepreneurship Education', 'Business Technology', 'Digital Marketing', 'AI for Business', 'Business Analytics', 'Business Planning', 'Mentorship'],
                'color'    => '#F59E0B',
                'image'    => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&q=80&auto=format&fit=crop',
                'sort_order' => 5,
            ],
            [
                'slug' => 'community-partnerships', 'num' => '06', 'glyph' => 'C',
                'title' => 'Community Partnerships',
                'short' => 'Building strong communities together with schools, employers, and organizations.',
                'long'  => 'No organization can solve complex community challenges alone. We collaborate with schools, nonprofits, businesses, employers, universities, government agencies, foundations, and community organizations to expand access to resources and opportunities.',
                'duration' => 'Ongoing',
                'format'   => 'Community · Collaborative',
                'skills'   => ['Access', 'Talent Development', 'Career Pathways', 'Entrepreneur Support', 'Organizational Capacity', 'Community Investment'],
                'color'    => '#111827',
                'image'    => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1200&q=80&auto=format&fit=crop',
                'sort_order' => 6,
            ],
        ];

        $slugs = collect($rows)->pluck('slug');
        Program::whereNotIn('slug', $slugs)->delete();

        foreach ($rows as $row) {
            Program::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }
}
