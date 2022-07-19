<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bodl text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text.sm upeprcase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text.sm upeprcase text-gray-800 my-3">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->last_day->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text.sm upeprcase text-gray-800 my-3">Categoria:
                <span class="normal-case font-normal">{{ $vacante->categoria->nombre }}</span>
            </p>

            <p class="font-bold text.sm upeprcase text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>

        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="/storage/{{ $vacante->imagen }}" alt="Imagen de la vacante">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar o postularte a esta vacante?
                <a class="font-bold text-indigo-600" href="{{ route('register') }}">
                    Obten una cuenta y aplica a esta y otras vacantes
                </a>
            </p>
        </div>
    @endguest

</div>
