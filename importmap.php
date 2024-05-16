<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.4',
    ],
    'typed.js' => [
        'version' => '2.1.0',
    ],
    'aos' => [
        'version' => '2.3.4',
    ],
    'glightbox' => [
        'version' => '3.3.0',
    ],
    'jquery' => [
        'version' => '3.7.1',
    ],
    '@fontsource/oxygen' => [
        'version' => '5.0.13',
    ],
    '@fontsource/oxygen/index.min.css' => [
        'version' => '5.0.13',
        'type' => 'css',
    ],
    '@fontsource-variable/league-spartan' => [
        'version' => '5.0.20',
    ],
    '@fontsource-variable/league-spartan/index.min.css' => [
        'version' => '5.0.20',
        'type' => 'css',
    ],
    '@fontsource/oxygen/300.css' => [
        'version' => '5.0.13',
        'type' => 'css',
    ],
    '@fontsource/oxygen/400.css' => [
        'version' => '5.0.13',
        'type' => 'css',
    ],
    '@fontsource/oxygen/700.css' => [
        'version' => '5.0.13',
        'type' => 'css',
    ],
];
