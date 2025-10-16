<a href="{{ route('admin.sponsors.show', $sponsor) }}"
   class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition-colors duration-200"
   title="Show Sponsor Details">
    <i class="fas fa-eye mr-1"></i> Show
</a>
<a href="{{ route('admin.sponsors.edit', $sponsor) }}"
   class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200"
   title="Edit Sponsor">
    <i class="fas fa-edit mr-1"></i> Edit
</a>
<form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition-colors duration-200"
            onclick="return confirm('Tem certeza que deseja deletar este sponsor?');"
            title="Delete Sponsor">
        <i class="fas fa-trash-alt mr-1"></i> Delete
    </button>
</form>
