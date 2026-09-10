<?php

/**
 * Legal page content.
 *
 * Kept in config rather than the database because it changes rarely and
 * benefits from being version-controlled alongside the code that renders
 * it. Mirror this file for each language you need to support.
 */

return [

    'privacy' => [
        'eyebrow' => '— Legal · Privacy',
        'title'   => 'Privacy Policy.',
        'sub'     => 'How Innovate Hub collects, uses, and protects the information you share with us.',
        'updated' => 'Last updated · April 14, 2026',
        'sections' => [
            [
                'n' => '01', 'label' => 'Overview', 'title' => 'What this policy covers',
                'body' => [
                    'Innovate Hub ("we", "us", the "Foundation") is a nonprofit that trains people for careers in technology. This policy describes what personal information we collect from applicants, students, alumni, mentors, donors, and visitors to our website — and what we do with it.',
                    'We believe a privacy policy should be legible. We have tried to write one in plain language. Where we use a legal term of art, we have done so because it carries a specific meaning under applicable law.',
                ],
            ],
            [
                'n' => '02', 'label' => 'What we collect', 'title' => 'Information you give us',
                'body' => [
                    'When you apply to a program, we collect your name, email, phone number, program of interest, prior experience, and the short essay you submit. We also collect anything else you voluntarily choose to tell us during admissions interviews.',
                    'When you donate, we collect your name, email, billing address, and the donation amount. Payment card details are handled by our payment processor and never stored on our servers.',
                    'When you apply to be a mentor or hiring partner, we collect your name, employer, role, and any materials you submit.',
                ],
            ],
            [
                'n' => '03', 'label' => 'What we collect', 'title' => 'Information we collect automatically',
                'body' => [
                    'When you visit innovatehub.com we collect standard web analytics: pages viewed, referring site, anonymized IP address, device type, and approximate geographic region. We use this data in aggregate to understand which parts of our programs prospective students are most interested in.',
                    'Our Laravel application stores session identifiers in a first-party cookie. See our Cookie Policy for details.',
                ],
            ],
            [
                'n' => '04', 'label' => 'How we use it', 'title' => 'How we use your information',
                'body' => [
                    'We use your information to review your application, communicate about your cohort, maintain our alumni network, process donations, report on our impact to funders (in aggregate only), and comply with legal obligations.',
                    'We do not sell your personal information. We do not share it with advertising networks. We do not train AI models on applicant essays or interview transcripts.',
                ],
            ],
            [
                'n' => '05', 'label' => 'Who we share with', 'title' => 'Service providers and partners',
                'body' => [
                    'We share limited information with service providers who help us operate — our email platform, our payments processor, our cloud host, and our error-tracking service. Each is bound by a data processing agreement.',
                    'With your explicit consent, we may share your resume and profile with hiring partners during the job-placement phase of your program. You can withdraw this consent at any time by emailing info@innovatehub.com.',
                ],
            ],
            [
                'n' => '06', 'label' => 'Your rights', 'title' => 'Access, correction, deletion',
                'body' => [
                    'You have the right to request a copy of the personal information we hold about you, to correct inaccurate information, and to request deletion. Depending on your jurisdiction, you may have additional rights under the GDPR, LGPD, or CCPA.',
                    'To exercise any of these rights, email info@innovatehub.com. We will respond within 30 days.',
                ],
            ],
            [
                'n' => '07', 'label' => 'Security', 'title' => 'How we protect your data',
                'body' => [
                    'Our application is built on Laravel with Blade templating. Authentication passwords are hashed with bcrypt. All traffic is served over TLS 1.3. Database backups are encrypted at rest and retained for 30 days.',
                    'No online service is perfectly secure. If we ever experience a breach that affects your personal information, we will notify you without undue delay and in accordance with applicable law.',
                ],
            ],
            // [
            //     'n' => '08', 'label' => 'Contact', 'title' => 'Questions',
            //     'body' => [
            //         'Our Data Protection Officer can be reached at info@innovatehub.com or by post at Innovate Hub, Attn: Privacy, 1 Mission Street, San Francisco, CA 94105, United States.',
            //     ],
            // ],
        ],
    ],

    'cookies' => [
        'eyebrow' => '— Legal · Cookies',
        'title'   => 'Cookie Policy.',
        'sub'     => 'What cookies Innovate Hub sets, why, and how to control them.',
        'updated' => 'Last updated · April 24, 2026',
        'sections' => [
            [
                'n' => '01', 'label' => 'What are cookies', 'title' => 'Cookies and similar technologies',
                'body' => [
                    'A cookie is a small text file placed on your device when you visit a website. Cookies let the site remember information about your visit — such as whether you are logged in — so that it works correctly on your next visit.',
                    'We also use a related mechanism called a CSRF token. This is a value stored in both a cookie and a hidden form field that prevents cross-site request forgery attacks. It is a security measure, not a tracking tool.',
                ],
            ],
            [
                'n' => '02', 'label' => 'Essential cookies', 'title' => 'Cookies we always set',
                'body' => [
                    'innovatehub_session — This cookie stores a random identifier that links your browser to your server-side session. It is created when you first visit the site and expires when you close your browser (or after 120 minutes of inactivity, whichever comes first). It is strictly necessary for the site to function.',
                    'XSRF-TOKEN — This cookie contains a cryptographic token used to verify that form submissions on our site are genuine. It is set alongside every session cookie. Without it, all form submissions (applications, contact requests) would be blocked as a security precaution.',
                    'ih_cookie_consent — This cookie stores your cookie preference (accepted / necessary only). It lives in your browser\'s localStorage rather than as an HTTP cookie, so it is never sent to our servers. It expires after one year.',
                ],
            ],
            [
                'n' => '03', 'label' => 'Analytics cookies', 'title' => 'Cookies we set with your consent',
                'body' => [
                    '_ih_analytics — If you consent to analytics, we set a first-party cookie that assigns your browser a random identifier. We use this to count unique visitors, understand which pages are most popular, and measure how people navigate through the application process.',
                    'We anonymise IP addresses before storing them. We do not build individual profiles, share analytics data with advertising networks, or use it to make automated decisions about you.',
                    'You can withdraw your analytics consent at any time by clicking "Cookie Policy" in the footer and selecting "Necessary only".',
                ],
            ],
            [
                'n' => '04', 'label' => 'Third-party cookies', 'title' => 'Cookies set by others',
                'body' => [
                    'We embed Google Fonts from fonts.googleapis.com. Google may set cookies or log your IP address when it serves font files. We have configured our font loading to minimise this exposure (using display=swap and preconnect hints), but we cannot fully control what Google sets. See the Google Privacy Policy for details.',
                    'We do not embed social-media share buttons, advertising pixels, or any other third-party tracking scripts on this site.',
                ],
            ],
            [
                'n' => '05', 'label' => 'Your controls', 'title' => 'How to manage or delete cookies',
                'body' => [
                    'Banner — When you first visit Innovate Hub, a banner gives you the choice to "Accept all" (essential + analytics) or "Necessary only" (essential only). You can also open "Manage" to toggle individual categories.',
                    'Footer link — After dismissing the banner, you can revisit your preferences at any time by clicking "Cookie Policy" in the footer, which links back to this page. We plan to add a direct "Update preferences" control in a future release.',
                    'Browser settings — Every major browser lets you block or delete cookies in its privacy or security settings. Note that blocking essential cookies will break parts of the site (forms will not submit). See your browser\'s help documentation for instructions.',
                ],
            ],
            [
                'n' => '06', 'label' => 'Legal basis', 'title' => 'Legal basis under the GDPR',
                'body' => [
                    'We rely on legitimate interest (Article 6(1)(f) of the GDPR) for essential cookies, because they are strictly necessary to deliver the service you requested and to protect the security of the site.',
                    'We rely on consent (Article 6(1)(a)) for analytics cookies. You can withdraw consent at any time with no effect on the lawfulness of processing that took place before withdrawal.',
                    'If you are in the EEA, UK, or Switzerland and have questions about our lawful basis, contact our Data Protection Officer at info@innovatehub.com.',
                ],
            ],
            [
                'n' => '07', 'label' => 'Changes', 'title' => 'Updates to this policy',
                'body' => [
                    'We may update this Cookie Policy when we change the cookies we use or when the law requires it. When we do, we will update the "Last updated" date above and, if the changes are material, display a notice on the site.',
                    'Questions? Email info@innovatehub.com.',
                ],
            ],
        ],
    ],

    'terms' => [
        'eyebrow' => '— Legal · Terms',
        'title'   => 'Terms of Service.',
        'sub'     => 'The agreement between you and Innovate Hub when you use our website and enroll in our programs.',
        'updated' => 'Last updated · April 14, 2026',
        'sections' => [
            [
                'n' => '01', 'label' => 'Agreement', 'title' => 'Accepting these terms',
                'body' => [
                    'These Terms of Service ("Terms") govern your use of innovatehub.com and any program administered by the Innovate Hub Foundation. By creating an applicant account, enrolling in a cohort, or continuing to use the site, you agree to be bound by these Terms.',
                    'If you do not agree to these Terms, do not use the site or enroll in our programs.',
                ],
            ],
            [
                'n' => '02', 'label' => 'Eligibility', 'title' => 'Who can apply',
                'body' => [
                    'Our programs are open to applicants aged 18 and older, in any country where we are legally able to operate. We evaluate applicants solely on curiosity, commitment, and fit with the program — not on prior credentials.',
                    'We reserve the right to decline any application at our sole discretion, subject to applicable anti-discrimination law.',
                ],
            ],
            [
                'n' => '03', 'label' => 'Your account', 'title' => 'Accounts and access',
                'body' => [
                    'If you create an account on our site, you are responsible for keeping your credentials confidential and for any activity that occurs under your account. Tell us immediately if you suspect unauthorized access.',
                    'We may suspend or terminate accounts that violate these Terms, disrupt our platform, or harm our community.',
                ],
            ],
            [
                'n' => '04', 'label' => 'Program commitments', 'title' => 'Student code of conduct',
                'body' => [
                    'Innovate Hub is a learning community. Students agree to engage honestly with the curriculum, treat peers and instructors with respect, complete their own work, and uphold the confidentiality of any partner-provided materials.',
                    'Harassment, discrimination, plagiarism, or misrepresentation of identity are grounds for immediate dismissal without refund.',
                ],
            ],
            [
                'n' => '05', 'label' => 'Intellectual property', 'title' => 'Who owns what',
                'body' => [
                    'The Innovate Hub name, logo, curriculum, and published materials are the intellectual property of the Foundation. You may reference them in good-faith personal use (for example, on a resume) but may not republish our curriculum without written permission.',
                    'You retain full ownership of the projects and code you produce during the program. We ask only for a non-exclusive right to feature your work in our marketing, which you may revoke at any time.',
                ],
            ],
            [
                'n' => '06', 'label' => 'Disclaimers', 'title' => 'No guarantee of employment',
                'body' => [
                    'We are proud of our placement outcomes, but we do not and cannot guarantee that any individual applicant will secure employment after graduating. Placement depends on many factors outside our control, including effort, labor-market conditions, and geography.',
                    'Our programs are provided "as is". To the fullest extent permitted by law, we disclaim all warranties, express or implied.',
                ],
            ],
            [
                'n' => '07', 'label' => 'Liability', 'title' => 'Limitation of liability',
                'body' => [
                    'To the maximum extent permitted by law, the Foundation, its officers, directors, employees, and volunteers are not liable for any indirect, incidental, special, consequential, or punitive damages arising out of your use of the site or participation in our programs.',
                    'Our total liability for any claim arising under these Terms is limited to one hundred U.S. dollars (US$100).',
                ],
            ],
            [
                'n' => '08', 'label' => 'General', 'title' => 'Governing law & changes',
                'body' => [
                    'These Terms are governed by the laws of the State of California, without regard to its conflicts of law principles. Any dispute not resolved informally will be heard in the state or federal courts located in San Francisco County.',
                    'We may update these Terms from time to time. If we make material changes, we will notify you by email and post a notice on the site at least 30 days in advance.',
                ],
            ],
        ],
    ],

];
