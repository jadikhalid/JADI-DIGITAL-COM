<?php

$allowedLangs = ['fr', 'en'];

// Changement de langue → cookie + redirection vers une URL propre (sans ?lang=)
if (isset($_GET['lang']) && in_array($_GET['lang'], $allowedLangs, true)) {
    $chosen = $_GET['lang'];
    setcookie('jadi_lang', $chosen, [
        'expires' => time() + 60 * 60 * 24 * 365,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    $_COOKIE['jadi_lang'] = $chosen;

    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    if (!is_string($path) || $path === '') {
        $path = '/';
    }

    header('Location: ' . $path, true, 303);
    exit;
}

$lang = (
    isset($_COOKIE['jadi_lang']) && in_array($_COOKIE['jadi_lang'], $allowedLangs, true)
) ? $_COOKIE['jadi_lang'] : 'fr';

$translations = [
    'fr' => [
        'meta_title' => 'JADI DIGITAL — Studio digital AI-native à Casablanca',
        'meta_description' => 'JADI DIGITAL, le studio qui a conçu Talents du Maroc : MVP, plateformes en marque blanche, automatisations et agents IA, maintenance applicative et accessibilité pour les entreprises européennes.',
        'eyebrow' => 'Studio digital',
        'cities' => ['Casablanca', 'Paris', 'New York'],
        'title' => 'On code ce que vous ressentez.',
        'subtitle' => 'Nous concevons et livrons des produits digitaux en vibe coding — rapide, précis, AI-native — pour les startups, PME et grandes organisations.',
        'cta_primary' => 'Discutons de votre projet',
        'cta_secondary' => 'Voir nos offres',
        'founder_eyebrow' => 'Le fondateur',
        'founder_name' => 'Khalid Jadi',
        'founder_role' => 'Fondateur de JADI DIGITAL',
        'founder_photo_alt' => 'Khalid Jadi, fondateur de JADI DIGITAL',
        'founder_summary' => [
            'AI engineer avec plus de 5 ans d\'expérience concrète, Khalid Jadi conçoit et met en production des systèmes d\'intelligence artificielle : agents, pipelines RAG, orchestration de modèles, recherche sémantique et intégration IA dans des produits digitaux. Il livre aussi des applications web, des applications natives et des logiciels desktop, avec une attention particulière à la fiabilité, à la performance et aux pipelines CI/CD.',
            'Ingénieur EMI en génie industriel, il s\'appuie sur plus de 10 ans de management opérationnel et stratégique : une vision business et une approche orientée ROI.',
        ],
        'founder_stats' => [
            ['value' => '5+ ans', 'label' => 'd\'ingénierie logicielle et de pratiques AI'],
            ['value' => '10+ ans', 'label' => 'de management opérationnel et stratégique'],
            ['value' => 'EMI', 'label' => 'Ingénieur, génie industriel'],
        ],
        'founder_skills_title' => 'Expertises',
        'founder_skills' => [
            'Développement full stack',
            'AI Engineering',
        ],
        'offers_eyebrow' => 'Nos offres',
        'offers_title' => 'Trois axes d\'activité',
        'offer_services_label' => 'Services',
        'offers' => [
            [
                'title' => 'Talents du Maroc',
                'subtitle' => 'https://talentsdumaroc.com',
                'url' => 'https://talentsdumaroc.com',
                'desc' => 'Propriétaire et gérant de la plateforme qui connecte les talents marocains aux entreprises nationales et internationales.',
                'services' => [
                    'Pool de talents',
                    'Mise en relation',
                    'Abonnements',
                    'Sourcing',
                    'Recrutement',
                    'Annonces',
                ],
            ],
            [
                'title' => 'Agence digitale',
                'subtitle' => 'AI-native',
                'desc' => 'Conception et livraison de produits digitaux 360° : web, mobile, desktop et systèmes d\'IA.',
                'services' => [
                    'Agents IA',
                    'Pipelines RAG',
                    'Orchestration de modèles',
                    'Recherche sémantique',
                    'Applications web',
                    'Applications natives',
                    'Logiciels desktop',
                ],
            ],
            [
                'title' => 'Offshore Tech Maroc',
                'subtitle' => 'Votre filiale IT de A à Z',
                'desc' => 'Accompagnement - all inclusive - des entreprises IT qui veulent créer une filiale, une représentation ou un centre de production au Maroc.',
                'services' => [
                    'Études de faisabilité',
                    'Business plan',
                    'Création juridique',
                    'Formalités administratives',
                    'Choix du local',
                    'Recrutement',
                    'Gestion',
                ],
            ],
        ],
        'contact_title' => 'Discutons de votre projet',
        'contact_desc' => 'Réponse sous 24 h. Le premier échange est gratuit.',
        'form' => [
            'name' => 'Nom complet',
            'email' => 'E-mail',
            'company' => 'Entreprise (optionnel)',
            'message' => 'Message',
            'submit' => 'Envoyer le message',
            'sending' => 'Envoi en cours…',
            'sent' => 'Message envoyé. Nous vous répondons sous 24 h.',
            'error' => 'L\'envoi a échoué. Veuillez réessayer.',
            'name_required' => 'Indiquez votre nom.',
            'email_required' => 'Indiquez votre e-mail.',
            'email_invalid' => 'Indiquez une adresse e-mail valide.',
            'message_required' => 'Rédigez votre message.',
            'message_min' => 'Le message doit contenir au moins 20 caractères.',
        ],
        'footer' => [
            'tagline' => 'Studio digital AI-native.',
            'nav_title' => 'Navigation',
            'nav_offers' => 'Offres',
            'nav_founder' => 'Fondateur',
            'nav_contact' => 'Contact',
            'contact_title' => 'Coordonnées',
            'email' => 'contact@jadi-digital.com',
            'phone' => '+33 X XX XX XX XX',
            'address' => 'Paris, France',
            'social_title' => 'Réseaux',
            'social_linkedin' => 'LinkedIn',
            'social_linkedin_url' => '#',
            'social_x' => 'X',
            'social_x_url' => '#',
            'social_github' => 'GitHub',
            'social_github_url' => '#',
            'legal_title' => 'Légal',
            'legal_mentions' => 'Mentions légales',
            'legal_mentions_url' => '#',
            'legal_privacy' => 'Confidentialité',
            'legal_privacy_url' => '#',
            'legal_terms' => 'CGU',
            'legal_terms_url' => '#',
            'copyright' => '© 2026 JADI DIGITAL. Tous droits réservés.',
        ],
    ],
    'en' => [
        'meta_title' => 'JADI DIGITAL — AI-native digital studio in Casablanca',
        'meta_description' => 'JADI DIGITAL, the studio behind Talents du Maroc: MVPs, white-label platforms, AI automations and agents, application maintenance and accessibility for European companies.',
        'eyebrow' => 'Digital studio',
        'cities' => ['Casablanca', 'Paris', 'New York'],
        'title' => 'We code what you feel.',
        'subtitle' => 'We design and ship digital products through vibe coding — fast, precise, AI-native — for startups, SMEs and large organisations.',
        'cta_primary' => 'Let\'s talk about your project',
        'cta_secondary' => 'See our services',
        'founder_eyebrow' => 'The founder',
        'founder_name' => 'Khalid Jadi',
        'founder_role' => 'Founder of JADI DIGITAL',
        'founder_photo_alt' => 'Khalid Jadi, founder of JADI DIGITAL',
        'founder_summary' => [
            'An AI engineer with 5+ years of hands-on experience, Khalid Jadi designs and ships production AI systems: agents, RAG pipelines, model orchestration, semantic search and AI embedded in digital products. He also builds web applications, native apps and desktop software, with a focus on reliability, performance and CI/CD pipelines.',
            'An EMI-trained industrial engineer, he brings 10+ years of operational and strategic management: a business vision and an ROI-driven approach.',
        ],
        'founder_stats' => [
            ['value' => '5+ yrs', 'label' => 'of software engineering and AI practices'],
            ['value' => '10+ yrs', 'label' => 'of operational and strategic management'],
            ['value' => 'EMI', 'label' => 'Industrial engineering degree'],
        ],
        'founder_skills_title' => 'Expertise',
        'founder_skills' => [
            'Full stack development',
            'AI Engineering',
        ],
        'offers_eyebrow' => 'Our services',
        'offers_title' => 'Three lines of business',
        'offer_services_label' => 'Services',
        'offers' => [
            [
                'title' => 'Talents du Maroc',
                'subtitle' => 'https://talentsdumaroc.com',
                'url' => 'https://talentsdumaroc.com',
                'desc' => 'Owner and operator of the platform that connects Moroccan talent with national and international companies.',
                'services' => [
                    'Talent pool',
                    'Matchmaking',
                    'Subscriptions',
                    'Sourcing',
                    'Recruitment',
                    'Job postings',
                ],
            ],
            [
                'title' => 'Digital agency',
                'subtitle' => 'AI-native',
                'desc' => 'Design and delivery of 360° digital products: web, mobile, desktop and AI systems.',
                'services' => [
                    'AI agents',
                    'RAG pipelines',
                    'Model orchestration',
                    'Semantic search',
                    'Web applications',
                    'Native apps',
                    'Desktop software',
                ],
            ],
            [
                'title' => 'Offshore Tech Morocco',
                'subtitle' => 'Your IT subsidiary from A to Z',
                'desc' => 'All-inclusive support for IT companies that want to create a subsidiary, a representation office or a production centre in Morocco.',
                'services' => [
                    'Feasibility studies',
                    'Business plan',
                    'Company incorporation',
                    'Administrative formalities',
                    'Site selection',
                    'Recruitment',
                    'Management',
                ],
            ],
        ],
        'contact_title' => 'Let\'s talk about your project',
        'contact_desc' => 'Reply within 24 hours. The first conversation is free.',
        'form' => [
            'name' => 'Full name',
            'email' => 'Email',
            'company' => 'Company (optional)',
            'message' => 'Message',
            'submit' => 'Send message',
            'sending' => 'Sending…',
            'sent' => 'Message sent. We will reply within 24 hours.',
            'error' => 'Sending failed. Please try again.',
            'name_required' => 'Please enter your name.',
            'email_required' => 'Please enter your email.',
            'email_invalid' => 'Please enter a valid email address.',
            'message_required' => 'Please write your message.',
            'message_min' => 'Message must be at least 20 characters.',
        ],
        'footer' => [
            'tagline' => 'AI-native digital studio.',
            'nav_title' => 'Navigation',
            'nav_offers' => 'Services',
            'nav_founder' => 'Founder',
            'nav_contact' => 'Contact',
            'contact_title' => 'Contact',
            'email' => 'contact@jadi-digital.com',
            'phone' => '+33 X XX XX XX XX',
            'address' => 'Paris, France',
            'social_title' => 'Social',
            'social_linkedin' => 'LinkedIn',
            'social_linkedin_url' => '#',
            'social_x' => 'X',
            'social_x_url' => '#',
            'social_github' => 'GitHub',
            'social_github_url' => '#',
            'legal_title' => 'Legal',
            'legal_mentions' => 'Legal notice',
            'legal_mentions_url' => '#',
            'legal_privacy' => 'Privacy',
            'legal_privacy_url' => '#',
            'legal_terms' => 'Terms',
            'legal_terms_url' => '#',
            'copyright' => '© 2026 JADI DIGITAL. All rights reserved.',
        ],
    ],
];

function __(string $key, mixed $default = null): mixed
{
    global $lang, $translations;

    $parts = explode('.', $key);
    $value = $translations[$lang] ?? [];

    foreach ($parts as $part) {
        if (! is_array($value) || ! array_key_exists($part, $value)) {
            return $default ?? $key;
        }
        $value = $value[$part];
    }

    return $value;
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function lang_url(string $newLang): string
{
    // Lien de bascule uniquement ; la page revient ensuite sur / (sans query)
    return '?lang=' . rawurlencode($newLang);
}

function asset_url(string $path): string
{
    $file = __DIR__ . '/' . ltrim($path, './');
    $version = is_file($file) ? (string) filemtime($file) : (string) time();

    return './' . ltrim($path, './') . '?v=' . rawurlencode($version);
}
