@csrf
<div><label class="text-sm font-medium">Name</label><x-input name="name" value="{{ old('name', $tag?->name) }}" required />@error('name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>

