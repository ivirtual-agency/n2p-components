<?php

namespace iVirtual\Net2phone;

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
}
