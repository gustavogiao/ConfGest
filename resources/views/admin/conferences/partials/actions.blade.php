<a href="{{ route('admin.conferences.show', $conference) }}"
   class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition-colors duration-200"
   title="Show Conference Details">
    <i class="fas fa-eye mr-1"></i> Show
</a>
<a href="{{ route('admin.conferences.edit', $conference) }}"
   class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200"
   title="Edit Conference">
    <i class="fas fa-edit mr-1"></i> Edit
</a>
<form action="{{ route('admin.conferences.destroy', $conference) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition-colors duration-200"
            onclick="return confirm('Are you sure you want to delete this conference?');"
            title="Delete Conference">
        <i class="fas fa-trash-alt mr-1"></i> Delete
    </button>
</form>
