<?php

namespace Raahin\HumanResource\Http\Controllers\Education;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Raahin\HumanResource\Http\Requests\Education\EducationStoreRequest;
use Raahin\HumanResource\Http\Requests\Education\EducationUpdateRequest;
use Raahin\HumanResource\Http\Resources\Education\EducationCollection;
use Raahin\HumanResource\Http\Resources\Education\EducationResource;
use Raahin\HumanResource\Models\Education;
use App\Http\Controllers\Controller;


class EducationController extends Controller
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
     * the list of educations of the given user with search and pagination
     *
     * @param Request $request
     * @param int $user
     * @return EducationCollection
     */
    public function index(Request $request, int $user): EducationCollection
    {
        $educations = $this->userModel::findOrFail($user)->education()
            ->search((string)$request->input("search", ""), $request->input("search_column"))
            ->orderBy($request->input("sort_column", "id"), $request->input("order", "desc"))
            ->paginate($request->input("per_page", 10))->withQueryString();

        return new EducationCollection($educations);
    }

    /**
     *  store an education for given user
     *
     * @param EducationStoreRequest $request
     * @param int $user
     * @return EducationResource
     */
    public function store(EducationStoreRequest $request, int $user): EducationResource
    {
        $education = $this->userModel::findOrFail($user)->education()->create($request->validated());

        return new EducationResource($education);
    }

    /**
     * returns the given education for given user
     *
     * @param Request $request
     * @param int $user
     * @param int $education
     * @return EducationResource
     */
    public function show(Request $request, int $user, int $education): EducationResource
    {
        $education = $this->userModel::findOrFail($user)->education()->findOrFail($education);

        return new EducationResource($education);
    }

    /**
     * updates the given education for given user
     *
     * @param EducationUpdateRequest $request
     * @param int $user
     * @param int $education
     * @return EducationResource
     */
    public function update(EducationUpdateRequest $request, int $user, int $education)
    {
        $education = $this->userModel::findOrFail($user)->education()->findOrFail($education);

        $this->userModel::findOrFail($user)->education()->update($request->validated(), $education);

        $education = $education->refresh();

        return new EducationResource($education);
    }

    /**
     * soft deletes the education for given user
     *
     * @param int $user
     * @param int $education
     * @return Response
     */
    public function destroy(int $user, int $education)
    {

        $this->userModel::findOrFail($user)->education()
            ->findOrFail($education)->delete();

        return response()->noContent();
    }

    /**
     * logged-in user's educations
     *
     * @param Request $request
     * @return EducationCollection
     */
    public function education(Request $request): EducationCollection
    {
        $education = auth()->user()->education()
            ->search((string)$request->input("search", ""), $request->input("search_column"))
            ->orderBy($request->input("sort_column", "id"), $request->input("order", "desc"))
            ->paginate($request->input("per_page", 10))->withQueryString();

        return new EducationCollection($education);
    }
}
