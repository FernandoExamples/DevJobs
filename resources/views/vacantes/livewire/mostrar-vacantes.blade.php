<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>

                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->last_day->format('d/m/Y') }}</p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="#"
                       class="text-center bg-slate-800 py-2 px-4 rounded-lg text-white text-sx font-bold uppercase">
                        Candidatos
                    </a>

                    <a href="{{ route('vacantes.edit', $vacante) }}"
                       class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white text-sx font-bold uppercase">
                        Editar
                    </a>

                    <button wire:click="$emit('deleteVacante', {{ $vacante->id }})"
                            class="text-center bg-red-600 py-2 px-4 rounded-lg text-white text-sx font-bold uppercase">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay Vacantes</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('deleteVacante', (vacanteId) => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarVacante', vacanteId);
                    Swal.fire(
                        'Eliminado!',
                        'La vacante ha sido eliminada.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
