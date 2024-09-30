<x-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-64 bg-gradient-to-b from-[#141d30] to-[#243b55] h-screen fixed top-0 left-0 flex flex-col justify-between transition-all duration-300 ease-in-out overflow-hidden">
            <div>
                <div class="flex justify-between items-center p-6">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/images/logo-white.svg') }}" class="w-28" alt="Logo">
                    </a>
                    <button id="OpenClose" class="text-white hover:text-gray-300 transition duration-300"
                        aria-label="Toggle Sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
                <nav class="mt-8 space-y-2">
                    <a href="{{ route('admin.customer.index') }}"
                        class="flex items-center px-6 py-3 {{ Request::is('admin/customer*') ? 'bg-[#1e2a4a] text-white' : 'text-gray-300 hover:bg-[#1e2a4a] hover:text-white' }} transition duration-300">
                        <img src="{{ asset('assets/images/customer.svg') }}" alt="Customers" class="h-5 w-5 mr-3">
                        <span>Customers</span>
                    </a>
                    <a href="{{ route('admin.product.index') }}"
                        class="flex items-center px-6 py-3 {{ Request::is('admin/product*') ? 'bg-[#1e2a4a] text-white' : 'text-gray-300 hover:bg-[#1e2a4a] hover:text-white' }} transition duration-300">
                        <img src="{{ asset('assets/images/inventory.svg') }}" alt="Product" class="h-5 w-5 mr-3">
                        <span>Product</span>
                    </a>
                    <a href="{{ route('admin.category.index') }}"
                        class="flex items-center px-6 py-3 {{ Request::is('admin/category*') ? 'bg-[#1e2a4a] text-white' : 'text-gray-300 hover:bg-[#1e2a4a] hover:text-white' }} transition duration-300">
                        <img src="{{ asset('assets/images/category.svg') }}" alt="Categories" class="h-5 w-5 mr-3">
                        <span>Categories</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e2a4a] hover:text-white transition duration-300">
                        <img src="{{ asset('assets/images/orders.svg') }}" alt="Orders" class="h-5 w-5 mr-3">
                        <span>Orders</span>
                    </a>
                </nav>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center profile-section">
                        <img src="{{ asset('assets/images/profile_naufal.jpg') }}" alt="PhotoUser"
                            class="w-10 h-10 rounded-full object-cover ">
                        <div class="pl-2">
                            <h4 class="text-white font-medium">Naufal Nabbih</h4>
                            <p class="text-gray-400 text-sm">Administrator</p>
                        </div>
                    </div>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300"
                        aria-label="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Main Content -->
        <div class="flex-1 ml-64 transition-all duration-300 ease-in-out">
            {{ $slot }}
        </div>
        <!-- End Main Content -->
    </div>

    <style>
        .sidebar-closed .profile-section {
            display: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const openCloseButton = document.getElementById('OpenClose');
            const mainContent = document.querySelector('.flex-1');
            const navLinks = sidebar.querySelectorAll('nav a');

            let sidebarOpen = true;

            

            const showDeleteConfirmation = () => {
                Swal.fire({
                    title: "Apakah Kamu Yakin?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Data Anda telah dihapus.",
                            icon: "success"
                        });
                    }
                });
            };

            openCloseButton.addEventListener('click', () => {
                sidebarOpen = !sidebarOpen;
                sidebar.style.width = sidebarOpen ? '256px' : '64px';
                mainContent.style.marginLeft = sidebarOpen ? '256px' : '64px';
                Array.from(sidebar.querySelectorAll('span, h4, p')).forEach(el => {
                    el.style.display = sidebarOpen ? 'inline' : 'none';
                });
                sidebar.classList.toggle('sidebar-closed', !sidebarOpen);
            });
        });
    </script>
</x-layout>
