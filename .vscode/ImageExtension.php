<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('responsive_image', [$this, 'generateResponsiveImage'], ['is_safe' => ['html']])
        ];
    }

    public function generateResponsiveImage(string $baseImage, string $alt = ''): string
    {
        $defaultWidths[] = [480, 800, 1200, 2000];
        // Détecter l'extension de l'image
        $imageInfo = pathinfo($baseImage);
        $basename = $imageInfo['filename'];
        $extension = $imageInfo['extension'];
        $src = sprintf('%s-%dw.%s', $basename, $defaultWidths(0), $extension);

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
