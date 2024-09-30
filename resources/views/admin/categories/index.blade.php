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
                    <div class="relative">
                        <input type="text" placeholder="Search categories..."
                            class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="w-5 h-5 text-gray-400 absolute right-3 top-2.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
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
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Baju</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layoutAdmin>
