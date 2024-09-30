<x-layoutAdmin>
    <div class="flex-1 ml-16 p-8 transition-all duration-300 ease-in-out">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Customers</h1>
            <p class="text-gray-600 mt-1">Manage your customer base</p>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-opacity duration-500 ease-in-out opacity-100"
            id="index">
            <div class="bg-gray-50 p-6 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Customer List</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search customers..."
                            class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="w-5 h-5 text-gray-400 absolute right-3 top-2.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <a href="{{ route('admin.customer.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-full transition duration-300 ease-in-out hover:shadow-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Customer
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
                                Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Address</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">example@example.com</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">123 Main St</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">example@example.com</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">123 Main St</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 ease-in-out opacity-0 max-w-md mx-auto hidden"
            id="edit">
            <div class="p-8 space-y-8">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-6 tracking-tight">Edit Customer</h2>
                <form class="space-y-6">
                    <div class="relative">
                        <input type="text" id="name" name="name" value="name"
                            class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="Name" required>
                        <label for="name"
                            class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                            Name
                        </label>
                    </div>

                    <div class="relative">
                        <input type="email" id="email" name="email" value="email"
                            class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="Email" required>
                        <label for="email"
                            class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                            Email
                        </label>
                    </div>
                    <div class="relative">
                        <input type="password" id="password" name="password" value="password"
                            class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="Password" required>
                        <label for="password"
                            class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                            Password
                        </label>
                    </div>

                    <div class="relative">
                        <textarea id="address" name="address" rows="3"
                            class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 resize-none"
                            placeholder="Address" required></textarea>
                        <label for="address"
                            class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                            Address
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                        Add Customer
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layoutAdmin>
