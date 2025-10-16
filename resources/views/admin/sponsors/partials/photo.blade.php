@if($sponsor->logo)
    <div class="mb-6 text-center">
        <img src="{{ asset('storage/' . $sponsor->logo) }}"
             alt="Photo of {{ $sponsor->name }}"
             class="w-48 h-48 object-cover rounded-full mx-auto border-4 border-indigo-500">
    </div>
@endif
