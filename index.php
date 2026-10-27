<?php
require __DIR__ . '/lang.php';

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

$cities = __('cities', []);
$founderSummary = __('founder_summary', []);
$founderStats = __('founder_stats', []);
$founderSkills = __('founder_skills', []);
$offers = __('offers', []);
$form = __('form', []);
$footer = __('footer', []);

$offerIcons = [
    'M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418',
    'M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z',
    'M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21',
];
?>
<!doctype html>
<html lang="<?= e($lang) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="description" content="<?= e((string) __('meta_description')) ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= e((string) __('meta_title')) ?>">
  <meta property="og:description" content="<?= e((string) __('meta_description')) ?>">
  <meta property="og:url" content="https://jadi-digital.com/">
  <link rel="icon" href="./img/favicon.svg" type="image/svg+xml">
  <title><?= e((string) __('meta_title')) ?></title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="<?= e(asset_url('style.css')) ?>">
</head>
<body class="bg-white font-sans text-gray-900 antialiased">
  <div class="lang-switcher" aria-label="Language">
    <a href="<?= e(lang_url('fr')) ?>" class="<?= $lang === 'fr' ? 'is-active' : '' ?>"<?= $lang === 'fr' ? ' aria-current="true"' : '' ?>>FR</a>
    <span aria-hidden="true">/</span>
    <a href="<?= e(lang_url('en')) ?>" class="<?= $lang === 'en' ? 'is-active' : '' ?>"<?= $lang === 'en' ? ' aria-current="true"' : '' ?>>EN</a>
  </div>

  <div data-jadi-page>
    <section class="relative overflow-hidden bg-gray-950 text-white">
      <div class="absolute inset-0 opacity-25 [background-image:radial-gradient(circle_at_1px_1px,white_1px,transparent_0)] [background-size:24px_24px]" aria-hidden="true"></div>
      <div class="absolute -right-24 -top-24 h-96 w-96 rounded-full bg-amber-500/25 blur-3xl" aria-hidden="true"></div>
      <div class="absolute -bottom-32 left-1/4 h-96 w-96 rounded-full bg-indigo-600/30 blur-3xl" aria-hidden="true"></div>
      <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-28 lg:grid-cols-[minmax(0,1fr)_auto] lg:items-center lg:gap-16 lg:px-8">
        <div class="relative flex h-48 w-48 items-center justify-center sm:h-64 sm:w-64 lg:order-last lg:h-[26rem] lg:w-[26rem]" data-jadi-logo>
          <div class="absolute inset-[22%] rounded-full bg-teal-400/20 blur-3xl" aria-hidden="true"></div>
          <div class="absolute inset-0 rounded-full border border-white/15" aria-hidden="true"></div>
          <div class="absolute inset-[14%] rounded-full border border-white/10" aria-hidden="true"></div>
          <div class="absolute inset-[28%] rounded-full border border-dashed border-teal-300/35" aria-hidden="true"></div>
          <span class="absolute left-[14.6%] top-[14.6%] h-2 w-2 -translate-x-1/2 -translate-y-1/2 rounded-full bg-teal-300 shadow-[0_0_12px_#5eead4]" aria-hidden="true"></span>
          <span class="absolute bottom-[14%] right-[50%] h-1.5 w-1.5 translate-x-1/2 translate-y-1/2 rounded-full bg-amber-300 shadow-[0_0_10px_#fcd34d]" aria-hidden="true"></span>
          <span class="absolute right-0 top-1/2 h-1.5 w-1.5 -translate-y-1/2 translate-x-1/2 rounded-full bg-indigo-300" aria-hidden="true"></span>
          <img
            src="<?= e(asset_url('img/jadi-digital-mark.png')) ?>"
            alt="JADI DIGITAL"
            width="560"
            height="381"
            class="relative w-[46%] drop-shadow-[0_8px_30px_rgba(45,212,191,0.25)]"
          >
        </div>
        <div>
          <p class="flex items-center gap-3 text-2xl tracking-[0.28em] sm:text-3xl" data-jadi-brand>
            <span><span class="font-extrabold text-white">JADI</span> <span class="font-light text-teal-300">DIGITAL</span></span>
            <span class="h-2.5 w-2.5 shrink-0 bg-teal-400 shadow-[0_0_14px_#2dd4bf]" aria-hidden="true"></span>
          </p>
          <div class="mt-4 flex flex-wrap items-center gap-x-4 gap-y-2 text-xs font-semibold uppercase tracking-[0.2em]">
            <span class="text-gray-400"><?= e((string) __('eyebrow')) ?></span>
            <span class="h-px w-10 bg-gradient-to-r from-teal-400/80 to-transparent" aria-hidden="true"></span>
            <span class="inline-flex flex-wrap items-center gap-x-2.5 gap-y-1 text-white/90">
              <svg class="h-3.5 w-3.5 text-teal-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
              <?php foreach ($cities as $i => $city): ?>
                <?php if ($i > 0): ?>
                  <span class="h-1 w-1 rounded-full bg-teal-400/70" aria-hidden="true"></span>
                <?php endif; ?>
                <span><?= e((string) $city) ?></span>
              <?php endforeach; ?>
            </span>
          </div>
          <h1 class="mt-6 max-w-3xl text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl"><?= e((string) __('title')) ?></h1>
          <p class="mt-6 max-w-2xl text-lg leading-relaxed text-gray-300"><?= e((string) __('subtitle')) ?></p>
          <div class="mt-10 flex flex-col gap-3 sm:flex-row">
            <button
              type="button"
              class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3 text-sm font-semibold text-gray-900 shadow-sm transition hover:bg-teal-50"
              data-scroll-to="jadi-contact"
            >
              <?= e((string) __('cta_primary')) ?>
              <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>
            <button
              type="button"
              class="inline-flex items-center justify-center rounded-xl px-6 py-3 text-sm font-semibold text-white ring-1 ring-white/30 transition hover:bg-white/10"
              data-scroll-to="jadi-offers"
            >
              <?= e((string) __('cta_secondary')) ?>
            </button>
          </div>
        </div>
      </div>
    </section>

    <section id="jadi-founder" class="bg-gray-50 py-20 sm:py-24" data-jadi-founder>
      <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[minmax(0,5fr)_minmax(0,7fr)] lg:items-start lg:gap-16 lg:px-8">
        <div class="relative mx-auto w-full max-w-sm lg:max-w-[488px]">
          <div class="absolute -inset-3 rounded-[2rem] bg-gradient-to-br from-teal-300/40 via-indigo-300/30 to-amber-200/40 blur-xl" aria-hidden="true"></div>
          <img
            src="<?= e(asset_url('img/jadi-founder.jpg')) ?>"
            alt="<?= e((string) __('founder_photo_alt')) ?>"
            width="488"
            height="610"
            loading="lazy"
            class="relative aspect-[4/5] w-full rounded-3xl object-cover shadow-xl ring-1 ring-gray-900/5"
          >
          <div class="absolute -bottom-5 left-6 right-6 rounded-2xl bg-white/95 px-5 py-4 shadow-lg ring-1 ring-gray-900/5 backdrop-blur">
            <p class="text-base font-bold text-gray-900"><?= e((string) __('founder_name')) ?></p>
            <p class="text-sm text-indigo-600"><?= e((string) __('founder_role')) ?></p>
          </div>
        </div>

        <div class="pt-4 lg:pt-0">
          <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600"><?= e((string) __('founder_eyebrow')) ?></p>
          <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?= e((string) __('founder_name')) ?></h2>
          <div class="mt-5 space-y-4 text-gray-600">
            <?php foreach ($founderSummary as $paragraph): ?>
              <p class="leading-relaxed"><?= e((string) $paragraph) ?></p>
            <?php endforeach; ?>
          </div>

          <dl class="mt-8 grid gap-4 sm:grid-cols-3">
            <?php foreach ($founderStats as $stat): ?>
              <div class="rounded-2xl bg-white p-5 ring-1 ring-gray-100">
                <dt class="sr-only"><?= e((string) ($stat['label'] ?? '')) ?></dt>
                <dd>
                  <span class="block text-2xl font-bold text-indigo-600"><?= e((string) ($stat['value'] ?? '')) ?></span>
                  <span class="mt-1 block text-sm text-gray-600"><?= e((string) ($stat['label'] ?? '')) ?></span>
                </dd>
              </div>
            <?php endforeach; ?>
          </dl>

          <h3 class="mt-10 text-sm font-semibold uppercase tracking-wider text-gray-900"><?= e((string) __('founder_skills_title')) ?></h3>
          <ul class="mt-4 grid gap-3 sm:grid-cols-2">
            <?php foreach ($founderSkills as $skill): ?>
              <li class="flex items-start gap-2.5 text-sm text-gray-700">
                <svg class="mt-0.5 h-4 w-4 shrink-0 text-teal-500" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                <span><?= e((string) $skill) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </section>

    <section id="jadi-offers" class="bg-white pb-20 pt-12 sm:pb-24 sm:pt-14">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
          <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600"><?= e((string) __('offers_eyebrow')) ?></p>
          <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?= e((string) __('offers_title')) ?></h2>
        </div>
        <div class="mt-8 grid gap-6 lg:grid-cols-3">
          <?php foreach ($offers as $i => $offer): ?>
            <article class="flex h-full flex-col rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:border-indigo-200 hover:shadow-md" data-jadi-offer>
              <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="<?= e($offerIcons[$i] ?? $offerIcons[0]) ?>"/></svg>
              </span>
              <h3 class="mt-5 text-lg font-bold text-gray-900"><?= e((string) ($offer['title'] ?? '')) ?></h3>
              <?php if (! empty($offer['subtitle'])): ?>
                <?php if (! empty($offer['url'])): ?>
                  <a href="<?= e((string) $offer['url']) ?>" target="_blank" rel="noopener noreferrer" class="mt-1 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-800"><?= e((string) $offer['subtitle']) ?></a>
                <?php else: ?>
                  <p class="mt-1 text-sm font-medium text-indigo-600"><?= e((string) $offer['subtitle']) ?></p>
                <?php endif; ?>
              <?php endif; ?>
              <p class="mt-2 flex-1 text-sm leading-relaxed text-gray-600"><?= e((string) ($offer['desc'] ?? '')) ?></p>
              <?php if (! empty($offer['services']) && is_array($offer['services'])): ?>
                <div class="mt-5 border-t border-gray-100 pt-4">
                  <p class="text-xs font-semibold uppercase tracking-wider text-gray-400"><?= e((string) __('offer_services_label')) ?></p>
                  <ul class="mt-2.5 flex flex-wrap gap-2">
                    <?php foreach ($offer['services'] as $service): ?>
                      <li class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700"><?= e((string) $service) ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="jadi-contact" class="relative overflow-hidden bg-indigo-100/80 py-20 sm:py-24">
      <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-indigo-400/25 blur-3xl" aria-hidden="true"></div>
      <div class="absolute -right-16 bottom-0 h-64 w-64 rounded-full bg-teal-400/20 blur-3xl" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-bold tracking-tight text-gray-950 sm:text-4xl"><?= e((string) __('contact_title')) ?></h2>
          <p class="mt-4 text-gray-700"><?= e((string) __('contact_desc')) ?></p>
        </div>

        <div id="jadi-contact-form" class="jadi-form-shell relative mt-10 p-6 text-left text-gray-900 sm:p-8">
          <form
            method="POST"
            action="sendEmail.php"
            class="jadi-form space-y-5"
            id="contact-form"
            novalidate
            data-error="<?= e((string) ($form['error'] ?? '')) ?>"
            data-sent="<?= e((string) ($form['sent'] ?? '')) ?>"
            data-sending="<?= e((string) ($form['sending'] ?? '')) ?>"
          >
            <div class="absolute -left-[9999px] top-0 h-0 w-0 overflow-hidden" aria-hidden="true">
              <label for="jadi_website">Website</label>
              <input id="jadi_website" type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="jadi-form-grid">
              <div class="jadi-field-wrap">
                <label for="jadi_name"><?= e((string) ($form['name'] ?? '')) ?></label>
                <input
                  id="jadi_name"
                  name="name"
                  type="text"
                  required
                  maxlength="120"
                  autocomplete="name"
                  data-required-message="<?= e((string) ($form['name_required'] ?? '')) ?>"
                  class="jadi-field"
                >
              </div>

              <div class="jadi-field-wrap">
                <label for="jadi_email"><?= e((string) ($form['email'] ?? '')) ?></label>
                <input
                  id="jadi_email"
                  name="email"
                  type="email"
                  required
                  maxlength="255"
                  autocomplete="email"
                  data-required-message="<?= e((string) ($form['email_required'] ?? '')) ?>"
                  data-email-message="<?= e((string) ($form['email_invalid'] ?? '')) ?>"
                  class="jadi-field"
                >
              </div>
            </div>

            <div class="jadi-field-wrap">
              <label for="jadi_company"><?= e((string) ($form['company'] ?? '')) ?></label>
              <input
                id="jadi_company"
                name="company"
                type="text"
                maxlength="160"
                autocomplete="organization"
                class="jadi-field"
              >
            </div>

            <div class="jadi-field-wrap">
              <label for="jadi_message"><?= e((string) ($form['message'] ?? '')) ?></label>
              <textarea
                id="jadi_message"
                name="message"
                rows="5"
                required
                maxlength="5000"
                data-required-message="<?= e((string) ($form['message_required'] ?? '')) ?>"
                data-min-length-message="<?= e((string) ($form['message_min'] ?? '')) ?>"
                class="jadi-field jadi-field-area"
              ></textarea>
            </div>

            <button type="submit" class="jadi-submit">
              <span><?= e((string) ($form['submit'] ?? '')) ?></span>
              <svg class="jadi-submit-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>
          </form>
        </div>
      </div>
    </section>

    <footer class="border-t border-white/10 bg-black text-gray-400">
      <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
          <div>
            <p class="text-sm tracking-[0.2em]">
              <span class="font-extrabold text-white">JADI</span>
              <span class="font-light text-teal-300"> DIGITAL</span>
            </p>
            <p class="mt-4 max-w-xs text-sm leading-relaxed"><?= e((string) ($footer['tagline'] ?? '')) ?></p>
          </div>

          <div>
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white"><?= e((string) ($footer['nav_title'] ?? '')) ?></p>
            <ul class="mt-4 space-y-2.5 text-sm">
              <li><a href="#jadi-offers" class="transition hover:text-white"><?= e((string) ($footer['nav_offers'] ?? '')) ?></a></li>
              <li><a href="#jadi-founder" class="transition hover:text-white"><?= e((string) ($footer['nav_founder'] ?? '')) ?></a></li>
              <li><a href="#jadi-contact" class="transition hover:text-white"><?= e((string) ($footer['nav_contact'] ?? '')) ?></a></li>
            </ul>
          </div>

          <div>
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white"><?= e((string) ($footer['contact_title'] ?? '')) ?></p>
            <ul class="mt-4 space-y-2.5 text-sm">
              <li>
                <a href="mailto:<?= e((string) ($footer['email'] ?? '')) ?>" class="transition hover:text-white">
                  <?= e((string) ($footer['email'] ?? '')) ?>
                </a>
              </li>
              <li><?= e((string) ($footer['phone'] ?? '')) ?></li>
              <li><?= e((string) ($footer['address'] ?? '')) ?></li>
            </ul>
          </div>

          <div class="space-y-8">
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white"><?= e((string) ($footer['social_title'] ?? '')) ?></p>
              <ul class="mt-4 flex flex-wrap gap-x-4 gap-y-2 text-sm">
                <li>
                  <a href="<?= e((string) ($footer['social_linkedin_url'] ?? '#')) ?>" class="transition hover:text-white"<?= ($footer['social_linkedin_url'] ?? '#') !== '#' ? ' target="_blank" rel="noopener noreferrer"' : '' ?>>
                    <?= e((string) ($footer['social_linkedin'] ?? '')) ?>
                  </a>
                </li>
                <li>
                  <a href="<?= e((string) ($footer['social_x_url'] ?? '#')) ?>" class="transition hover:text-white"<?= ($footer['social_x_url'] ?? '#') !== '#' ? ' target="_blank" rel="noopener noreferrer"' : '' ?>>
                    <?= e((string) ($footer['social_x'] ?? '')) ?>
                  </a>
                </li>
                <li>
                  <a href="<?= e((string) ($footer['social_github_url'] ?? '#')) ?>" class="transition hover:text-white"<?= ($footer['social_github_url'] ?? '#') !== '#' ? ' target="_blank" rel="noopener noreferrer"' : '' ?>>
                    <?= e((string) ($footer['social_github'] ?? '')) ?>
                  </a>
                </li>
              </ul>
            </div>

            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white"><?= e((string) ($footer['legal_title'] ?? '')) ?></p>
              <ul class="mt-4 space-y-2.5 text-sm">
                <li><a href="<?= e((string) ($footer['legal_mentions_url'] ?? '#')) ?>" class="transition hover:text-white"><?= e((string) ($footer['legal_mentions'] ?? '')) ?></a></li>
                <li><a href="<?= e((string) ($footer['legal_privacy_url'] ?? '#')) ?>" class="transition hover:text-white"><?= e((string) ($footer['legal_privacy'] ?? '')) ?></a></li>
                <li><a href="<?= e((string) ($footer['legal_terms_url'] ?? '#')) ?>" class="transition hover:text-white"><?= e((string) ($footer['legal_terms'] ?? '')) ?></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="mt-12 border-t border-white/10 pt-6 text-xs text-gray-500">
          <?= e((string) ($footer['copyright'] ?? '')) ?>
        </div>
      </div>
    </footer>
  </div>

  <div id="toast-root" class="toast-root" aria-live="polite"></div>
  <script src="<?= e(asset_url('app.js')) ?>"></script>
</body>
</html>
