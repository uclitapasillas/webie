<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
   <div wire:loading wire:target="createMarca" class="overlay">
       <div class="spinner"></div>
   </div>
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
                   <h2 class="text-lg font-semibold mb-4">Agregar Nueva Marca</h2>
       
                   <!-- Formulario -->
                   <form wire:submit.prevent="createMarca">
                       <div class="md:col-span-6 mb-4">
                           <x-label for="name">
                               Nombre Marca
                           </x-label>
                           <x-input id="name" wire:model="name" placeholder="Nombre de la Marca" />
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
                   </form>
               </div>
           </div>
           @endif
       </div>

   </div>

   <!-- Cards -->
   <div class="grid grid-cols-12 gap-6">

       <div class="col-span-full xl:col-span-12 bg-white dark:bg-gray-800 shadow-sm rounded-xl">

           <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60 flex flex-col items-center gap-4 md:flex-row md:justify-between">
               <h2 class="font-semibold text-gray-800 dark:text-gray-100">Marcas</h2>
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
                       placeholder="Buscar Marca">
               </div>
           </header>

           <div class="p-3">

               <!-- Table -->
               <div class="overflow-x-auto">
                   <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                           @foreach ($marcas as $marca)
                               <tr>
                                   <td class="p-2">
                                       <div class="ps-1">
                                           <div class="text-base font-semibold">{{ $marca->name }}</div>
                                           <div class="font-normal text-gray-500">{{ $marca->description }}</div>
                                       </div>
                                   </td>
                                   <td class="p-2">
                                       <div class="text-left">{{ $marca->created_at->diffForHumans() }}</div>
                                   </td>
                                   <td class="px-4 py-3 flex items-center justify-end">
                                       <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                           <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                               <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                           </svg>
                                       </button>
                                       <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                           <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                               <li>
                                                   <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                               </li>
                                               <li>
                                                   <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                               </li>
                                           </ul>
                                           <div class="py-1">
                                               <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                           </div>
                                       </div>
                                   </td>
                                   
                               </tr>
                           @endforeach

                       </tbody>
                   </table>
                   <div class="mt-10">
                       {{ $marcas->links()}}
                   </div>
               </div>
           </div>
       </div>
   </div>

</div>

