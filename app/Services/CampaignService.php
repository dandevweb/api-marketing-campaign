<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\CampaignHasBeenTakenException;
use App\Models\Campaign;

class CampaignService
{

    public function store(array $input): Campaign
    {
        $campaignExists = Campaign::where($input)->exists();

        return !$campaignExists ? Campaign::create($input) : throw new CampaignHasBeenTakenException();
    }

    public function update(array $input, Campaign $campaign): Campaign
    {
        $campaignExists = Campaign::where($input)->where('name', '!=', $campaign->name)->exists();

        if ($campaignExists) {
            throw new CampaignHasBeenTakenException();
        }

        $campaign->fill($input);
        $campaign->save();

        return $campaign->fresh();
    }
}