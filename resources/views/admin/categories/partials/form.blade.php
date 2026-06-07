@csrf
<div><label class="text-sm font-medium">Name</label><x-input name="name" value="{{ old('name', $category?->name) }}" required />@error('name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div><label class="text-sm font-medium">Description</label><x-textarea name="description" rows="4">{{ old('description', $category?->description) }}</x-textarea></div>

