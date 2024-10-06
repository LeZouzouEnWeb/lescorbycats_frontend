<?php

/**
 *Renvoie la carte d'importation pour cette application.
 *
 *-"chemin" est un chemin à l'intérieur du système de mappage d'actifs. Utilisez le
 *Commande "debug:asset-map" pour voir la liste complète des chemins.
 *
 *-"point d'entrée" (JavaScript uniquement) défini sur true pour tout module qui
 *être utilisé comme "point d'entrée" (et passé à la fonction importmap() Twig).
 *
 *La commande "importmap:require" peut être utilisée pour ajouter de nouvelles entrées à ce fichier.
 */
return [
    'app' => [
        'path' => './assets/app.ts',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        // 'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
        'path' => '@symfony/stimulus-bundle/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
];
