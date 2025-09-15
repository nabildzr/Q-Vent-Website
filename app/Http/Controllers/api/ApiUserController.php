<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ApiUserController extends Controller
{
    public function getUserById($id)
    {

        if (!$id) {
            return response()->json(['error' => 'ID is required'], 400);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function getUserProfile(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        return response()->json($user, 200);
    }

    public function editProfile(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'string|max:255',
                'phone_number' => 'max_digits:15|min_digits:10|regex:/^\+?[0-9]{10,15}$/',
            ]);

            $user = $request->user();

            if ($request->filled('name')) {
                $user->name = $request->name;
            }

            if ($request->filled('phone_number')) {
                $user->phone_number = $request->phone_number;
            }
            $user->save();

            DB::commit();

            return response()->json(['message' => 'Profile updated successfully', 'user' => $user], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update profile', 'details' => $e->getMessage()], 500);
        }
    }

    public function changePasswordInProfile(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
                'new_password_confirmation' => 'required',
            ]);

            if ($validator->fails()) {
                DB::rollBack();
                return response()->json(['error' => 'Validation failed', 'details' => $validator->errors()], 422);
            }


            // $user = User::find($request->user()->id);

            $user = $request->user();

            if (!Hash::check($request->current_password, $user->password)) {
                DB::rollBack();
                return response()->json(['error' => 'Current password is incorrect'], 400);
            }

            if (Hash::check($request->new_password, $user->password)) {
                DB::rollBack();
                return response()->json(['error' => 'New password cannot be the same as the current password'], 400);
            }

            if ($request->new_password !== $request->new_password_confirmation) {
                DB::rollBack();
                return response()->json(['error' => 'New password and confirmation password do not match'], 400);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::commit();

            return response()->json(['message' => 'Password changed successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to change password', 'details' => $e->getMessage()], 500);
        }
    }
}
