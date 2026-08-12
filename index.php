<?php include 'lang.php'; ?>
<!doctype html>
<html lang="<?= $lang ?>">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./img/favicon.svg" type="image/svg+xml" />
  <title><?= __('meta_title') ?></title>
  <link
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <div class="grain" aria-hidden="true"></div>

  <header class="topbar">
    <nav class="topbar-nav" aria-label="Primary">
      <a href="#method"><?= __('nav_method') ?></a>
      <a href="#deliver"><?= __('nav_deliver') ?></a>
      <a href="#work"><?= __('nav_work') ?></a>
      <a href="#contact"><?= __('nav_contact') ?></a>
    </nav>
    <div class="topbar-right">
      <div class="lang-switcher">
        <a href="<?= lang_url('fr') ?>" class="<?= $lang === 'fr' ? 'active' : '' ?>">FR</a>
        <span>/</span>
        <a href="<?= lang_url('en') ?>" class="<?= $lang === 'en' ? 'active' : '' ?>">EN</a>
      </div>
      <button type="button" class="btn-ghost btn-scroll-contact"><?= __('nav_cta') ?></button>
    </div>
  </header>

  <main>
    <section class="hero" id="hero">
      <div class="hero-grid" aria-hidden="true"></div>
      <div class="hero-glow" aria-hidden="true"></div>
      <div class="hero-inner">
        <p class="hero-brand reveal"><?= __('hero_brand') ?></p>
        <h1 class="hero-title reveal"><?= __('hero_title') ?></h1>
        <p class="hero-sub reveal"><?= __('hero_sub') ?></p>
        <div class="hero-cta reveal">
          <button type="button" class="btn-primary btn-scroll-contact"><?= __('hero_cta') ?></button>
          <button type="button" class="btn-ghost btn-scroll-work"><?= __('hero_cta_secondary') ?></button>
        </div>
      </div>
    </section>

    <section class="section" id="method">
      <div class="inner">
        <p class="section-tag"><?= __('method_tag') ?></p>
        <h2 class="section-title"><?= __('method_title') ?></h2>
        <p class="section-sub"><?= __('method_sub') ?></p>
        <ol class="steps">
          <li class="step">
            <span class="step-index">01</span>
            <div>
              <h3><?= __('step1_label') ?></h3>
              <p><?= __('step1_text') ?></p>
            </div>
          </li>
          <li class="step">
            <span class="step-index">02</span>
            <div>
              <h3><?= __('step2_label') ?></h3>
              <p><?= __('step2_text') ?></p>
            </div>
          </li>
          <li class="step">
            <span class="step-index">03</span>
            <div>
              <h3><?= __('step3_label') ?></h3>
              <p><?= __('step3_text') ?></p>
            </div>
          </li>
        </ol>
      </div>
    </section>

    <section class="section section-alt" id="deliver">
      <div class="inner">
        <p class="section-tag"><?= __('deliver_tag') ?></p>
        <h2 class="section-title"><?= __('deliver_title') ?></h2>
        <p class="section-sub"><?= __('deliver_sub') ?></p>
        <ul class="deliver-list">
          <li><span class="mono">→</span> <?= __('deliver_1') ?></li>
          <li><span class="mono">→</span> <?= __('deliver_2') ?></li>
          <li><span class="mono">→</span> <?= __('deliver_3') ?></li>
          <li><span class="mono">→</span> <?= __('deliver_4') ?></li>
        </ul>
      </div>
    </section>

    <section class="section" id="work">
      <div class="inner">
        <p class="section-tag"><?= __('work_tag') ?></p>
        <h2 class="section-title"><?= __('work_title') ?></h2>
        <p class="section-sub"><?= __('work_sub') ?></p>

        <div class="work-slider" data-work-slider>
          <div class="work-slider-track" data-work-track>
            <?php
            $works = [
              ['title' => 'work_1_title', 'meta' => 'work_1_meta', 'text' => 'work_1_text', 'url' => 'work_1_url', 'cta' => 'work_1_cta', 'alt' => 'work_1_alt', 'img' => 'work_1_img'],
              ['title' => 'work_2_title', 'meta' => 'work_2_meta', 'text' => 'work_2_text', 'url' => 'work_2_url', 'cta' => 'work_2_cta', 'alt' => 'work_2_alt', 'img' => 'work_2_img'],
            ];
            foreach ($works as $i => $work):
            ?>
            <article class="work-project work-slide<?= $i === 0 ? ' is-active' : '' ?>" data-work-slide>
              <a
                class="work-visual"
                href="<?= __($work['url']) ?>"
                target="_blank"
                rel="noopener noreferrer">
                <img
                  src="<?= __($work['img']) ?>"
                  alt="<?= htmlspecialchars(__($work['alt']), ENT_QUOTES) ?>"
                  width="1024"
                  height="576"
                  loading="<?= $i === 0 ? 'eager' : 'lazy' ?>"
                  decoding="async" />
              </a>
              <div class="work-body">
                <p class="work-meta mono"><?= __($work['meta']) ?></p>
                <h3><?= __($work['title']) ?></h3>
                <p><?= __($work['text']) ?></p>
                <a
                  class="work-cta mono"
                  href="<?= __($work['url']) ?>"
                  target="_blank"
                  rel="noopener noreferrer"><?= __($work['cta']) ?></a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>

          <div class="work-slider-controls">
            <button type="button" class="work-nav" data-work-prev aria-label="<?= htmlspecialchars(__('work_prev'), ENT_QUOTES) ?>">
              <span aria-hidden="true">←</span>
            </button>
            <p class="work-slider-index mono" data-work-index aria-live="polite">01 / 02</p>
            <button type="button" class="work-nav" data-work-next aria-label="<?= htmlspecialchars(__('work_next'), ENT_QUOTES) ?>">
              <span aria-hidden="true">→</span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-alt" id="contact">
      <div class="inner contact-inner">
        <div class="contact-copy">
          <p class="section-tag"><?= __('contact_tag') ?></p>
          <h2 class="section-title"><?= __('contact_title') ?></h2>
          <p class="section-sub"><?= __('contact_sub') ?></p>
          <p class="contact-email mono">khalid@jadi-digital.com</p>
        </div>
        <form class="contact-form" id="contact-form" action="sendEmail.php" method="POST">
          <label>
            <span><?= __('form_name') ?></span>
            <input type="text" name="name" required autocomplete="name" />
          </label>
          <label>
            <span><?= __('form_email') ?></span>
            <input type="email" name="email" required autocomplete="email" />
          </label>
          <label>
            <span><?= __('form_intent') ?></span>
            <textarea name="message" rows="4" required placeholder="<?= __('form_intent_ph') ?>"></textarea>
          </label>
          <input type="hidden" name="subject" value="Vibe coding build" />
          <input type="hidden" name="company" value="" />
          <button type="submit" class="btn-primary form-submit"
            data-label="<?= htmlspecialchars(__('form_submit'), ENT_QUOTES) ?>"
            data-sending="<?= htmlspecialchars(__('form_sending'), ENT_QUOTES) ?>"
            data-ok="<?= htmlspecialchars(__('form_ok'), ENT_QUOTES) ?>"
            data-err="<?= htmlspecialchars(__('form_err'), ENT_QUOTES) ?>"
            data-net="<?= htmlspecialchars(__('form_net'), ENT_QUOTES) ?>">
            <?= __('form_submit') ?>
          </button>
        </form>
      </div>
    </section>
  </main>

  <footer class="footer">
    <p class="footer-line mono"><?= __('footer_line') ?></p>
    <p class="footer-copy"><?= __('footer_copyright') ?></p>
  </footer>

  <script src="./app.js"></script>
</body>

</html>
