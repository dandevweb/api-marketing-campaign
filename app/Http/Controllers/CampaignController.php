<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use App\Services\CampaignService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignController extends Controller
{
    public function __construct(
        private CampaignService $campaignService,
    ) {}

    public function index(): ResourceCollection
    {
        return CampaignResource::collection(Campaign::all());
    }

    public function store(CampaignRequest $campaignRequest): CampaignResource
    {
        return new CampaignResource($this->campaignService->store($campaignRequest->validated()));
    }

    public function show(Campaign $campaign): CampaignResource
    {
        return new CampaignResource($campaign);
    }

    public function update(CampaignRequest $campaignRequest, Campaign $campaign): CampaignResource
    {
        return new CampaignResource($this->campaignService->update($campaignRequest->validated(), $campaign));
    }

    public function destroy(Campaign $campaign): void
    {
        $campaign->deleteOrFail();
    }

    public function paginate(int $perPage = 10)
    {
        return CampaignResource::collection(Campaign::paginate($perPage));
    }
}