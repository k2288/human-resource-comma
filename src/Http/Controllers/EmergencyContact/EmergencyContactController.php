<?php

namespace Raahin\HumanResource\Http\Controllers\EmergencyContact;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Raahin\HumanResource\Http\Requests\EmergencyContact\EmergencyContactStoreRequest;
use Raahin\HumanResource\Http\Requests\EmergencyContact\EmergencyContactUpdateRequest;
use Raahin\HumanResource\Http\Resources\EmergencyContact\EmergencyContactCollection;
use Raahin\HumanResource\Http\Resources\EmergencyContact\EmergencyContactResource;
use App\Http\Controllers\Controller;

class EmergencyContactController extends Controller
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
     * the list of emergency contacts of the given user with search and pagination
     *
     * @param Request $request
     * @param int $user
     * @return EmergencyContactCollection
     */
    public function index(Request $request, int $user): EmergencyContactCollection
    {
        $emergencyContacts = $this->userModel::findOrFail($user)->emergencyContact()
            ->search((string)$request->input("search", ""), $request->input("search_column"))
            ->orderBy($request->input("sort_column", "id"), $request->input("order", "desc"))
            ->paginate($request->input("per_page", 10))->withQueryString();

        return new EmergencyContactCollection($emergencyContacts);
    }

    /**
     * store an emergency contact for given user
     *
     * @param EmergencyContactStoreRequest $request
     * @param int $user
     * @return EmergencyContactResource
     */
    public function store(EmergencyContactStoreRequest $request, int $user): EmergencyContactResource
    {
        $emergencyContact = $this->userModel::findOrFail($user)->emergencyContact()->create($request->validated());

        return new EmergencyContactResource($emergencyContact);
    }

    /**
     * returns the given education for given user
     *
     * @param Request $request
     * @param int $user
     * @param int $emergencyContact
     * @return EmergencyContactResource
     */
    public function show(Request $request, int $user, int $emergencyContact): EmergencyContactResource
    {
        $emergencyContact = $this->userModel::findOrFail($user)->emergencyContact()->findOrFail($emergencyContact);

        return new EmergencyContactResource($emergencyContact);
    }

    /**
     * updates the given emergency contact for given user
     *
     * @param EmergencyContactUpdateRequest $request
     * @param int $user
     * @param int $emergencyContact
     * @return EmergencyContactResource
     */
    public function update(EmergencyContactUpdateRequest $request, int $user, int $emergencyContact): EmergencyContactResource
    {
        $emergencyContact = $this->userModel::findOrFail($user)->emergencyContact()->findOrFail($emergencyContact);

        $this->userModel::findOrFail($user)->emergencyContact()->update($request->validated(), $emergencyContact);

        $emergencyContact = $emergencyContact->refresh();

        return new EmergencyContactResource($emergencyContact);
    }

    /**
     * soft deletes the given emergency contact for given user
     *
     * @param Request $request
     * @param int $user
     * @param int $emergencyContact
     * @return Response
     */
    public function destroy(Request $request, int $user, int $emergencyContact): Response
    {
        $this->userModel::findOrFail($user)->emergencyContact()->findOrFail($emergencyContact)->delete();

        return response()->noContent();
    }

    /**
     * logged-in user's emergency contacts
     *
     * @param Request $request
     * @return EmergencyContactCollection
     */
    public function emergencyContact(Request $request): EmergencyContactCollection
    {
        $emergencyContact = auth()->user()->emergencyContact()
            ->search((string)$request->input("search", ""), $request->input("search_column"))
            ->orderBy($request->input("sort_column", "id"), $request->input("order", "desc"))
            ->paginate($request->input("per_page", 10))->withQueryString();

        return new EmergencyContactCollection($emergencyContact);
    }
}
