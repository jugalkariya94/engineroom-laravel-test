<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSaveRequest;
use App\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //

    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $contacts = $this->contactRepository->all($user->id);
            return response()->json([
                'successs' => true,
                'contacts' => $contacts
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'successs' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function get(Request $request, $id)
    {
        try {
            $user = $request->user();
            $contact = $this->contactRepository->get($id, $user->id);
            return response()->json([
                'successs' => true,
                'contact' => $contact
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'successs' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function save(ContactSaveRequest $request, $id)
    {
        try {
            $user = $request->user();
            $data = array_merge($request->all(), ['user_id' => $user->id]);
            $contact = $this->contactRepository->save($data);
            return response()->json([
                'successs' => true,
                'contact' => $contact
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'successs' => false,
                'message' => $e->getTraceAsString()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function delete(Request $request, $id)
    {
        try {
            $user = $request->user();
            $contact = $this->contactRepository->delete($id, $user->id);
            return response()->json([
                'successs' => true
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'successs' => false,
                'message' => $e->getTraceAsString()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
