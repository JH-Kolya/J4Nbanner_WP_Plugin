# Countdown Banner Pro - Professional Commercial Plugin Structure

countdown-banner-pro/
├── countdown-banner-pro.php
├── uninstall.php
├── readme.txt
├── README.md
├── LICENSE
├── CHANGELOG.md
├── composer.json
├── package.json
├── .gitignore
├── .editorconfig
├── .phpcs.xml.dist
├── assets/
│   ├── banner-preview.png
│   ├── css/
│   │   ├── admin.css
│   │   └── public.css
│   └── js/
│       ├── admin.js
│       ├── preview.js
│       └── countdown.js
├── admin/
│   ├── class-admin.php
│   ├── class-settings.php
│   ├── class-ajax-preview.php
│   ├── views/
│   │   ├── settings-page.php
│   │   └── live-preview.php
│   └── partials/
├── public/
│   ├── class-public.php
│   ├── class-shortcode.php
│   ├── class-banner-renderer.php
│   └── templates/
├── includes/
│   ├── class-plugin.php
│   ├── class-loader.php
│   ├── class-activator.php
│   ├── class-deactivator.php
│   ├── class-i18n.php
│   ├── class-options.php
│   ├── class-validator.php
│   ├── class-visibility-rules.php
│   ├── class-countdown-engine.php
│   └── helpers.php
├── blocks/
│   └── countdown-banner-block/
├── elementor/
│   └── class-elementor-widget.php
├── languages/
│   ├── countdown-banner-pro.pot
│   └── translations/
├── tests/
│   ├── phpunit/
│   └── integration/
├── docs/
│   ├── developer-guide.md
│   ├── hooks.md
│   └── architecture.md
└── .github/
    ├── workflows/
    │   ├── phpcs.yml
    │   ├── phpunit.yml
    │   └── release.yml
    └── ISSUE_TEMPLATE/
