<?php
declare(strict_types=1);

namespace App\Domain\Country;

class Country {
    public $name;
    public $alpha2;
    public $alpha3;
    public $numeric;
    public $iso3166;

    public function getFlagUrl() {
        return '/flag-images/' . strtolower($this->alpha2) . '.png';
    }

    /**
     * @return Country
     */
    public static function fromCsvRow ($row) {
        $o = new self();
        $o->name = $row[0];
        $o->alpha2 = $row[1];
        $o->alpha3 = $row[2];
        $o->numeric = $row[3];
        $o->iso3166 = $row[4];
        return $o;
    }
}
