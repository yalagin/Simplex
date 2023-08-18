<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{

    private function is_leap_year(int $year = null): bool
    {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }

    public function index($request): Response
    {
        if ($this->is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
}
