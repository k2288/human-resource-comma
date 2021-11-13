<?php

namespace Raahin\HumanResource\Http\Controllers\Experience;


use Illuminate\Http\Request;
use Raahin\HumanResource\Http\Requests\Experience\ExperienceStoreRequest;
use Raahin\HumanResource\Http\Requests\Experience\ExperienceUpdateRequest;
use Raahin\HumanResource\Http\Resources\Experience\ExperienceCollection;
use Raahin\HumanResource\Http\Resources\Experience\ExperienceResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Raahin\HumanResource\Models\Experience;

class ExperienceController extends Controller
{

    /**
     * contains user model namespace
     *
     * @var string $userModel
     */
    private $userModel;

    public function __construct()
    {
        $this->userModel = config("human-resource.users_model_namespace");
    }


    /**
     * the list of experiences of the given user with search and pagination
     *
     * @param Request $request
     * @param int $user
     * @return ExperienceCollection
     */
    public function index(Request $request, int $user): ExperienceCollection
    {
        $experiences = $this->userModel::findOrFail($user)->experience()
            ->search((string)$request->input("search", ""), $request->input("search_column"))
            ->orderBy($request->input("sort_column", "id"), $request->input("order", "desc"))
            ->paginate($request->input("per_page", 10))->withQueryString();

        return new ExperienceCollection($experiences);
    }

    /**
     * store an experience for given user
     *
     * @param ExperienceStoreRequest $request
     * @param int $user
     * @return ExperienceResource
     */
    public function store(ExperienceStoreRequest $request, int $user): ExperienceResource
    {
        $experience = $this->userModel::findOrFail($user)->experience()->create($request->validated());

        return new ExperienceResource($experience);
    }

    /**
     * returns the given experience for given user
     *
     * @param Request $request
     * @param int $user
     * @param int $experience
     * @return ExperienceResource
     */
    public function show(Request $request, int $user, int $experience): ExperienceResource
    {
        $experience = $this->userModel::findOrFail($user)->experience()->findOrFail($experience);

        return new ExperienceResource($experience);
    }

    /**
     * updates the given experience for given user
     *
     * @param ExperienceUpdateRequest $request
     * @param int $user
     * @param int $experience
     * @return ExperienceResource
     */
    public function update(ExperienceUpdateRequest $request, int $user, int $experience): ExperienceResource
    {
        $experience = $this->userModel::findOrFail($user)->experience()->findOrFail($experience);

        $this->userModel::findOrFail($user)->experience()->update($request->validated(), $experience);

        $experience = $experience->refresh();

        return new ExperienceResource($experience);
    }

    /**
     * soft deletes the experience for given user
     *
     * @param int $user
     * @param int $experience
     * @return Response
     */
    public function destroy(int $user, int $experience): Response
    {
        $this->userModel::findOrFail($user)->experience()
            ->findOrFail($experience)->delete();

        return response()->noContent();
    }

    /**
     * logged-in user's experiences
     *
     * @param Request $request
     * @return ExperienceCollection
     */
    public function experience(Request $request): ExperienceCollection
    {
        $experience = auth()->user()->experience()
            ->search((string)$request->input("search", ""), $request->input("search_column"))
            ->orderBy($request->input("sort_column", "id"), $request->input("order", "desc"))
            ->paginate($request->input("per_page", 10))->withQueryString();

        return new ExperienceCollection($experience);
    }
}
