<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{

    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        if ($request->filled('surname')) {
            $user->surname = $request->surname;
        }
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        if ($request->filled('biography')) {
            $user->biography = $request->biography;
        }
        if ($request->filled('city')) {
            $user->city = $request->city;
        }
        if ($request->filled('country')) {
            $user->country = $request->country;
        }
        if ($request->filled('title')) {
            $user->title = $request->title;
        }
        if ($request->filled('number')) {
            $user->number = $request->number;
        }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->move(public_path('cvs/' . $user->id), 'cv.pdf');
            $user->cv_path = 'cvs/' . $user->id . '/cv.pdf';
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->move(public_path('images/' . $user->id), $imageName);
            $user->img_path = 'images/' . $user->id . '/' . $imageName;
        }

        $user->save();

        return new UserResource($user);
    }


    public function getAllUsers(Request $request)
    {
        $users = User::where('is_deleted', 0)->paginate(10);

        return UserResource::collection($users);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->name = 'Deleted';
            $user->surname = 'User';
            $user->email = 'deleted.user' . $id . '@deleted.com';
            $user->is_deleted = true;
            $user->save();


            return response()->json([
                'success' => true,
                'message' => 'User marked as deleted successfully.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }
    }
}
