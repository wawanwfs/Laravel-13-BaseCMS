@csrf
<div><label class="text-sm font-medium">Name</label><x-input name="name" value="{{ old('name', $managedUser?->name) }}" autocomplete="name" required />@error('name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div><label class="text-sm font-medium">Email</label><x-input name="email" type="email" value="{{ old('email', $managedUser?->email) }}" autocomplete="email" required />@error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div class="grid gap-4 md:grid-cols-2">
    <div><label class="text-sm font-medium">Role</label><x-select name="role">@foreach ($roles as $role)<option value="{{ $role->value }}" @selected(old('role', $managedUser?->role?->value ?? 'user') === $role->value)>{{ $role->label() }}</option>@endforeach</x-select></div>
    <label class="flex min-h-11 items-center gap-2 pt-7 text-sm"><input class="size-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500" type="checkbox" name="is_active" value="1" @checked(old('is_active', $managedUser?->is_active ?? true))> Active</label>
</div>
<div class="grid gap-4 md:grid-cols-2">
    <div><label class="text-sm font-medium">Password</label><x-input name="password" type="password" autocomplete="new-password" @if (! $managedUser) required @endif />@error('password') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
    <div><label class="text-sm font-medium">Confirm password</label><x-input name="password_confirmation" type="password" autocomplete="new-password" @if (! $managedUser) required @endif /></div>
</div>
