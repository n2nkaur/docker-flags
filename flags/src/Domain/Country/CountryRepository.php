<?php
declare(strict_types=1);

namespace App\Domain\Country;

class CountryRepository
{
    /**
     * @var Country[]
     */
    private $countries = [];

    public function __construct()
    {
        $f = fopen(__DIR__ . '/../../../wikipedia-iso-country-codes.csv', 'r');
        while (!feof($f)) {
            $row = fgetcsv($f);
            if ($row) {
                $this->countries[] = Country::fromCsvRow($row);
            }
        }
    }

    public function findAll(): array
    {
        return $this->countries;
    }

    public function findByAlpha2($alpha2): Country
    {
        foreach ($this->countries as $country) {
            if ($country->alpha2 == $alpha2) {
                return $country;
            }
        }

        return null;
    }

    public function getByIndex ($index): Country {
        return $this->countries[$index];
    }

    public function getCount () {
        return count($this->countries);
    }

    public function getRandomCountry (): Country {
        $index = rand(0, $this->getCount() - 1);
        return $this->getByIndex($index);
    }
}
