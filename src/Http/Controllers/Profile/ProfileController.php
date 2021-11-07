<?php

namespace Raahin\HumanResource\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Raahin\HumanResource\Http\Requests\Profile\ProfileStoreRequest;
use Raahin\HumanResource\Http\Requests\Profile\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Raahin\HumanResource\Http\Resources\Profile\ProfileResource;


class ProfileController extends Controller
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = config("human-resource.users_model_namespace");
    }


    /**
     * show given user's profile
     *
     * @param Request $request
     * @param int $user
     * @return ProfileResource
     */
    public function show(Request $request, int $user): ProfileResource
    {
        $profile = $this->userModel::findOrFail($user)->profile;
        return new ProfileResource($profile);
    }

    /**
     * make a profile for given user if it doesn't have profile
     * or updates the profile of the given user
     *
     * @param ProfileStoreRequest $request
     * @param int $user
     * @return ProfileResource
     */
    public function storeOrUpdate(ProfileStoreRequest $request, int $user): ProfileResource
    {
        $profile = $this->userModel::findOrFail($user)->profile()->updateOrCreate([], $request->validated());

        return new ProfileResource($profile);
    }


    /**
     * delete user's profile
     *
     * @param Request $request
     * @param int $user
     * @return Response
     */
    public function destroy(Request $request, int $user): Response
    {
        $this->userModel::findOrFail($user)->profile()->delete();

        return response()->noContent();
    }


}