<x-layoutAdmin>
    <div class="flex-1 ml-16 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Products</h1>
        <p class="text-gray-600 mb-8">Manage your product base</p>

        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-gray-800">Add New Product</h2>
                <a href="{{ route('admin.product.index') }}" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                <div id="drop-area"
                    class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition-all duration-300">
                    <input type="file" id="image" name="image" class="hidden" accept="image/*" required>
                    <label for="image" class="cursor-pointer">
                        <div id="preview" class="hidden mt-2">
                            <img id="preview-image" src="#" alt="Preview" class="mx-auto max-h-48 rounded-lg">
                        </div>
                        <div id="drop-text">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 48 48">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6">
                                </path>
                            </svg>
                            <p class="mt-1 text-sm text-gray-600">Drag & Drop your files or Browse</p>
                        </div>
                    </label>
                </div>

                @foreach (['nama', 'warna', 'stok'] as $field)
                    <div class="relative">
                        <input type="{{ $field === 'stok' ? 'number' : 'text' }}" id="{{ $field }}"
                            name="{{ $field }}"
                            class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="{{ ucfirst($field) }}" required autocomplete="off">
                        <label for="{{ $field }}"
                            class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                            {{ ucfirst($field) }}
                        </label>
                    </div>
                @endforeach

                <div class="relative">
                    <select id="category" name="category"
                        class="peer w-full px-4 py-3 rounded-lg border-2 border-gray-200 text-gray-700 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                        required>
                        <option value="" disabled selected>Select a category</option>
                    </select>
                    <label for="category"
                        class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-600 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3.5 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-500">
                        Category
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                    Add Product
                </button>
            </form>

        </div>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');
        const previewImage = document.getElementById('preview-image');
        const dropText = document.getElementById('drop-text');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('border-blue-500'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('border-blue-500'), false);
        });

        dropArea.addEventListener('drop', handleDrop, false);
        fileInput.addEventListener('change', () => handleFiles(fileInput.files));

        function handleDrop(e) {
            handleFiles(e.dataTransfer.files);
        }

        function handleFiles(files) {
            if (files.length > 0 && files[0].type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    preview.classList.remove('hidden');
                    dropText.classList.add('hidden');
                }
                reader.readAsDataURL(files[0]);
            }
        }
    </script>
</x-layoutAdmin>
