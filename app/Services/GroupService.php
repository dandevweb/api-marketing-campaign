<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\GroupHasBeenTakenException;
use App\Models\Group;

class GroupService
{

    public function store(array $input): Group
    {
        $groupExists = Group::whereName($input['name'])->exists();

        $input['active'] = !isset($input['campaign_id']) ? false : true;

        return !$groupExists ? Group::create($input) : throw new GroupHasBeenTakenException();
    }

    public function update(array $input, Group $group): Group
    {
        $groupExists = Group::where($input)->where('name', '!=', $group->name)->exists();

        if ($groupExists) {
            throw new GroupHasBeenTakenException();
        }

        $group->fill($input);
        $group->save();

        return $group->fresh();
    }
}