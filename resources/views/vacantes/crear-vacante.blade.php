<form action="#" class="md:w-1/2 space-y-5">
    <div>
        <x-label for="title" value="Título" />

        <x-input class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus
            placeholder="Titulo" />
    </div>

    <div>
        <x-label for="salary" value="Salario Mensual" />

        <select name="salary"
            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option disabled selected>--Selecciona--</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-label for="category" value="Categoria" />

        <select name="category"
            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option disabled selected>--Selecciona--</option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
        </select>
    </div>

    <div>
        <x-label for="company" value="Empresa" />

        <x-input class="block mt-1 w-full" type="text" name="company" :value="old('company')" required
            autofocus
            placeholder="Empresa: Netfil, Uber, Netlify" />
    </div>

    <div>
        <x-label for="last_day" value="Último día para postularse" />

        <x-input class="block mt-1 w-full" type="date" name="last_day" :value="old('last_day')" required
            autofocus
            placeholder="Empresa: Netfil, Uber, Netlify" />
    </div>

    <div>
        <x-label for="description" value="Descripción del Puesto" />

        <textarea name="description" placeholder="Descripción general del puesto, experiencia..."
            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-72"></textarea>
    </div>

    <div>
        <x-label for="image" value="Imagen" />

        <x-input class="block mt-1 w-full" type="file" name="image" required />
    </div>

    <x-button>Crear Vacante</x-button>
</form>
