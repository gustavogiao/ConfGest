<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Admin - Users Management')" subtitle="Manage all users, add new ones, edit or delete existing users." />
    </x-slot>
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <x-page-header :title="'Users List'" :route="route('admin.users.create')" button="Add New User" />
                <x-success-message />
                @include('admin.users.partials.table', ['users' => $users])
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
