<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class ImageExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function doSomething(string $baseImage, string $alt = '')
    {

        $defaultWidths = [480, 800, 1200, 2000];
        // Détecter l'extension de l'image
        $imageInfo = pathinfo($baseImage);
        $basename = $imageInfo['filename'];
        $extension = $imageInfo['extension'];
        // dd($defaultWidths[1]);
        $src = sprintf('%s-%dw.%s', $basename, $defaultWidths[0], $extension);

        // Générer automatiquement le srcset
        $srcset = [];
        foreach ($defaultWidths as $width) {
            $srcset[] = sprintf('%s-%dw.%s %dw', $basename, $width, $extension, $width);
        }
        $srcset = implode(', ', $srcset);

        // Valeur par défaut pour l'attribut sizes
        $sizes = '(max-width: 600px) 480px, (max-width: 1000px) 800px, 1200px';

        // Générer la balise <img>
        return sprintf(
            '<img src="%s" srcset="%s" sizes="%s" alt="%s">',
            $src,
            $srcset,
            $sizes,
            $alt
        );

    }
}
