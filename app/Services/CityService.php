<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\CityHasBeenTakenException;
use App\Models\City;

class CityService
{

    public function store(array $input): City
    {
        $cityExists = City::whereName($input['name'])->exists();

        $input['active'] = !isset($input['campaign_id']) ? false : true;

        return !$cityExists ? City::create($input) : throw new CityHasBeenTakenException();
    }

    public function update(array $input, City $city): City
    {
        $cityExists = City::where($input)->where('name', '!=', $city->name)->exists();

        if ($cityExists) {
            throw new CityHasBeenTakenException();
        }

        $city->fill($input);
        $city->save();

        return $city->fresh();
    }
}