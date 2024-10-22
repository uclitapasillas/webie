<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <div class="sm:flex sm:justify-between sm:items-center mb-8">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Webie</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Filter button -->
            <x-dropdown-filter align="right" />

            <!-- Datepicker built with flatpickr -->
            <x-datepicker />

            <!-- Add view button -->
            <button wire:click="openModal"
                class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                    <path
                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="max-xs:sr-only">Nuevo</span>
            </button>

            @if($isOpen)
            <div class="fixed inset-0 flex items-center justify-center z-50">
                <!-- Overlay para oscurecer el fondo -->
                <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity duration-300 ease-out" wire:click="closeModal"></div>
        
                <!-- Contenido del modal -->
                <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 p-6 dark:bg-gray-800">
                    <h2 class="text-lg font-semibold mb-4">Agregar Nueva Categoría</h2>
        
                    <!-- Formulario -->
                    <form wire:submit.prevent="createCategory">
                        <div class="md:col-span-6 mb-4">
                            <x-label for="name">
                                Nombre Categoría
                            </x-label>
                            <x-input id="name" wire:model="name" placeholder="Nombre de la Categoría" />
                            <x-input-error for="name"/>
                        </div>
                        <div class="md:col-span-6 mb-4">
                            <x-label for="Descripción">
                                Descripción
                            </x-label>
                            <x-input id="description" wire:model="description" placeholder="Descripción" />
                            <x-input-error for="description"/>
                        </div>
        
                        <div class="flex justify-end">
                            <button type="button" wire:click="closeModal" class="mr-2 btn bg-gray-400 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Cancelar</button>
                            <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Guardar</button>
                        </div>

                        {{--<div wire:loading>
                            <div class="spinner">Cargando...</div>
                        </div>--}}
                    </form>
                </div>
            </div>
            @endif

        </div>

    </div>
    {{--<style>
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #3498db;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            animation: spin 1s linear infinite;
        }
    
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>--}}
    <!-- Cards -->
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-full xl:col-span-12 bg-white dark:bg-gray-800 shadow-sm rounded-xl">

            <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60 flex flex-col items-center gap-4 md:flex-row md:justify-between">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100">Categorías</h2>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar Categoría">
                </div>
            </header>

            <div class="p-3">

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full dark:text-gray-300">
                        <!-- Table header -->
                        <thead
                            class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                            <tr>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Nombre</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Creación</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-center">Acciones</div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td class="p-2">
                                        <div class="ps-1">
                                            <div class="text-base text-gray-800 font-semibold">{{ $categoria->name }}</div>
                                            <div class="font-normal text-gray-500">{{ $categoria->description }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-left">{{ $categoria->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-center text-green-500">$3,877</div>
                                    </td>
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-10">
                        {{$categorias->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

