@props(['buttonText' => 'Nuevo'])

<div x-data="{ buscarAbierto: false }">
    <!-- Botón de búsqueda -->
    <button @click="buscarAbierto = true"
        class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
        <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
            <path
                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
        </svg>
        <span class="max-xs:sr-only">{{ $buttonText }}</span>
    </button>

    <!-- Modal -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity flex justify-center items-center"
        x-show="buscarAbierto" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-100" 
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" 
        aria-hidden="true" x-cloak>
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg w-1/3 p-4">
            <div class="flex justify-between items-center"
                    @click.outside="buscarAbierto = false"
                    @keydown.escape.window="buscarAbierto = false"
            >
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Buscar</h2>
                <button @click="buscarAbierto = false" class="text-gray-600 dark:text-gray-400">
                    ✖
                </button>
            </div>

            <!-- Cuerpo del modal vacío -->
            <div class="mt-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
