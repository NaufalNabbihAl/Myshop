<x-layoutAdmin>
    <div class="flex-1 ml-16 p-8 transition-all duration-300 ease-in-out">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
            <p class="text-gray-600 mt-1">Manage your category base</p>
        </div>
        <div
            class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 ease-in-out max-w-2xl mx-auto">
            <div class="p-8 space-y-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">Add New Category</h2>
                    <a href="{{ route('admin.category.index') }}"
                        class="text-blue-600 hover:text-blue-800 transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>
                <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="relative">
                        <input type="text" id="name" name="name"
                            class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="Name" required autocomplete="none" value="{{ old('name') }}">
                        <label for="name"
                            class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                            Name
                        </label>
                    </div>

                    <button type="submit" id="submitButton"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                        Add Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('categoryForm');
            const submitButton = document.getElementById('submitButton');

            @if (session('duplicate'))
                Swal.fire({
                    title: "Category Already Exists",
                    text: "{{ session('duplicate') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, create anyway!",
                    cancelButtonText: "No, cancel!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: "Error!",
                    text: "{{ session('error') }}",
                    icon: "error"
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: "Error!",
                    text: "{{ $errors->first() }}",
                    icon: "error"
                });
            @endif

            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                showConfirm();
            });

            function showConfirm() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "The data will be saved!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, save it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else {
                        Swal.fire({
                            title: "Cancelled!",
                            text: "The data was not saved.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    </script>
</x-layoutAdmin>
