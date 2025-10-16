@if($speaker->photo)
    <div class="mb-6 text-center">
        <img src="{{ asset('storage/' . $speaker->photo) }}"
             alt="Photo of {{ $speaker->name }}"
             class="w-48 h-48 object-cover rounded-full mx-auto border-4 border-indigo-500">
    </div>
@endif
