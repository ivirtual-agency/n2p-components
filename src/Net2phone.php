<?php

namespace iVirtual\Net2phone;

use Artesaos\SEOTools\Facades\SEOTools;
use Exception;
use Illuminate\View\View;

class Net2phone
{
    /**
     * Get the international websites.
     */
    public static function getInternationalWebsites(): array
    {
        return [
            'usa' => ['name' => 'United States', 'url' => 'https://net2phone.com'],
            'canada' => ['name' => 'Canada', 'url' => 'https://net2phone.ca'],
            'spain' => ['name' => 'España', 'url' => 'https://net2phone.es'],
            'brazil' => ['name' => 'Brasil', 'url' => 'https://net2phone.com.br'],
            'argentina' => ['name' => 'Argentina', 'url' => 'https://net2phone.com.ar'],
            'colombia' => ['name' => 'Colombia', 'url' => 'https://net2phone.co'],
            'mexico' => ['name' => 'Mexico', 'url' => 'https://net2phone.mx'],
            'peru' => ['name' => 'Peru', 'url' => 'https://net2phone.pe'],
        ];
    }

    /**
     * Return a view with the corresponding SEO.
     */
    public function viewWithSEO(string $viewName, array $data = []): View
    {
        $seoName = 'seo/' . $viewName;

        SEOTools::setTitle($this->checkTranslationSEO($seoName . '.title'));
        SEOTools::setDescription($this->checkTranslationSEO($seoName . '.description'));

        return view($viewName, $data);
    }

    /**
     * Check SEO translation exists.
     */
    private function checkTranslationSEO(string $key): string
    {
        $trans = trans($key);

        throw_if($trans === $key, new Exception('SEO not set: ' . $key));

        return $trans;
    }
}
