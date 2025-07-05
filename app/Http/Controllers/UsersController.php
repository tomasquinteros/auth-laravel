<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserServicesInterface;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(protected UserServicesInterface $userServices)
    {
    }

    public function index()
    {
        try {
            $users = $this->userServices->getAll();
            return response()->json([
                'success' => true,
                'message' => 'Users were found',
                'data' => $users
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }
    }

    public function show($id)
    {
        try {
            if (empty($id) || !is_string($id)) {
                throw new Exception('ID is incorrect, you must enter correct ID');
            }
            $user = $this->userServices->getById($id);
            return response()->json([
                'success' => true,
                'message' => 'The user was found',
                'data' => $user
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }
    }

    public function create(UserRequest $request)
    {
        try {
            $userCreated = $this->userServices->create($request);

            return response()->json([
                'success' => true,
                'message' => 'User has been created successfully.',
                'data' => $userCreated
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }
    }

    public function update($id, Request $request)
    {
        try {
            if (empty($id) || !is_string($id)) {
                throw new Exception('ID is incorrect, you must enter correct ID');
            }

            $userUpdated = $this->userServices->update($id, $request);

            return response()->json([
                'success' => true,
                'message' => 'User has been updated successfully',
                'data' => $userUpdated
            ]);

        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }
    }

    public function destroy($id)
    {
        try {
            if (empty($id) || !is_string($id)) {
                throw new Exception('ID is incorrect, you must enter correct ID');
            }
            $this->userServices->delete($id);

            return response()->json([
                'success' => true,
                'message' => 'User has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }
    }
}
