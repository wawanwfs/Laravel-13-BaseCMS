<?php

namespace App\Http\Controllers\Superadmin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', User::class);

        return view('superadmin.users.index', [
            'users' => User::latest()->paginate(15),
            'roles' => UserRole::cases(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', User::class);

        return view('superadmin.users.create', [
            'roles' => UserRole::cases(),
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create([
            ...$request->validated(),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('superadmin.users.index')->with('toast', [
            'type' => 'success',
            'message' => 'User created.',
        ]);
    }

    public function show(User $user): View
    {
        $this->authorize('view', $user);

        return view('superadmin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        $this->authorize('update', $user);

        return view('superadmin.users.edit', [
            'user' => $user,
            'roles' => UserRole::cases(),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        if (blank($data['password'] ?? null)) {
            $data = Arr::except($data, ['password']);
        }

        $user->update([
            ...$data,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('superadmin.users.index')->with('toast', [
            'type' => 'success',
            'message' => 'User updated.',
        ]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);
        $user->delete();

        return redirect()->route('superadmin.users.index')->with('toast', [
            'type' => 'warning',
            'message' => 'User deleted.',
        ]);
    }
}

