<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'campaign_id' => $this->campaign_id ?? null,
            'campaign_name' => $this->campaign->name ?? null,
            'active' => (bool)$this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}