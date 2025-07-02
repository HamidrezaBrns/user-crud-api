<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(50);

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['nullable'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'postal_code' => ['nullable'],
            'age' => ['nullable'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::create($validated);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['nullable'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'postal_code' => ['nullable'],
            'age' => ['nullable'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user->update($validated);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response(status: 204);
    }
}
