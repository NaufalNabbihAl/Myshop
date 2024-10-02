<x-layoutAdmin>
    <div class="flex-1 ml-16 p-8 transition-all duration-300 ease-in-out">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
            <p class="text-gray-600 mt-1">Manage your category base</p>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-opacity duration-500 ease-in-out opacity-100"
            id="index">
            <div class="bg-gray-50 p-6 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Category List</h2>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('admin.category.index') }}" method="GET" class="relative">
                        <input type="text" name="search" id="searchInput" placeholder="Search categories..."
                            value="{{ $search ?? '' }}" autocomplete="none"
                            class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit" class="absolute right-3 top-2.5">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                    <a href="{{ route('admin.category.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-full transition duration-300 ease-in-out hover:shadow-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Category
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $c)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $c->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    <a href="{{ route('admin.category.edit', $c->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                    <form id="deleteForm" action="{{ route('admin.category.destroy', $c->id) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="deleteButton"
                                            class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ** script Delete Functionality
            const form = document.getElementById('deleteForm');
            const submitButton = document.getElementById('deleteButton');

            // ** script Search Functionality                  
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.querySelector('tbody');


            // ** script Delete Functionality
            @if (session('category_created'))
                Swal.fire({
                    title: "Success!",
                    text: "Category created successfully.",
                    icon: "success"
                });
            @endif

            @if (session('category_updated'))
                Swal.fire({
                    title: "Success!",
                    text: "Category updated successfully.",
                    icon: "success"
                });
            @endif

            @if (session('category_deleted'))
                Swal.fire({
                    title: "Success!",
                    text: "Category deleted successfully.",
                    icon: "success"
                });
            @endif

            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                showConfirmDelete();
            });

            function showConfirmDelete() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else {
                        Swal.fire({
                            title: "Cancelled!",
                            text: "Your data is not delete.",
                            icon: "error"
                        });
                    }
                });
            }
            // ** End script Delete Functionality

            // ** script Search Functionality
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value;

                fetch(`{{ route('admin.category.search') }}?search=${searchTerm}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = '';
                        data.forEach((category, index) => {
                            tableBody.innerHTML += `
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${index + 1}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${category.name}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                <a href="/admin/category/${category.id}/edit" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                <form id="deleteForm" action="/admin/category/${category.id}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="deleteButton" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    `;
                        });
                    });
            });
            // ** End script Search Functionality
        });
    </script>
</x-layoutAdmin>
