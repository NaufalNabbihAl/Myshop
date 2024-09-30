<x-layout>
    <div class="container mx-auto px-4 h-screen flex items-center justify-center">
        <div class="max-w-sm w-full rounded overflow-hidden shadow-lg bg-white">
            <form action="" method="">
                <div class="px-6 py-8">
                    <h1 class="text-3xl font-bold text-center mb-6 text-gray-700">Login</h1>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" class="w-full border p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 " autocomplete="off">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" class="w-full border p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>