<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupController extends Controller
{
    public function __construct(
        private GroupService $groupService,
    ) {}

    public function index(): ResourceCollection
    {
        return GroupResource::collection(Group::with('campaign')->get());
    }

    public function store(GroupRequest $groupRequest): GroupResource
    {
        return new GroupResource($this->groupService->store($groupRequest->validated()));
    }

    public function show(Group $group): GroupResource
    {
        return new GroupResource($group);
    }

    public function update(GroupRequest $groupRequest, Group $group): GroupResource
    {
        return new GroupResource($this->groupService->update($groupRequest->validated(), $group));
    }

    public function destroy(Group $group): void
    {
        $group->deleteOrFail();
    }

    public function paginate(int $perPage = 10)
    {
        return GroupResource::collection(Group::paginate($perPage));
    }
}