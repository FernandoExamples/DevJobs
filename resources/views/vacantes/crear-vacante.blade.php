<form action="#"
      class="md:w-1/2 space-y-5"
      wire:submit.prevent='crearVacante'
      novalidate>
    <div>
        <x-label for="titulo"
                 value="Título" />

        <x-input class="block mt-1 w-full"
                 type="text"
                 wire:model="titulo"
                 :value="old('titulo')"
                 required
                 autofocus
                 placeholder="Titulo" />

        @error('titulo')
            <x-alert message="{{ $message }}" />
        @enderror
    </div>

    <div>
        <x-label for="salario"
                 value="Salario Mensual" />

        <select wire:model="salario"
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option disabled
                    selected>--Selecciona--
            </option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>

        @error('salario')
            <x-alert message="{{ $message }}" />
        @enderror
    </div>

    <div>
        <x-label for="categoria"
                 value="Categoria" />

        <select wire:model="categoria"
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option disabled
                    selected>--Selecciona-- </option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>

        @error('categoria')
            <x-alert message="{{ $message }}" />
        @enderror
    </div>

    <div>
        <x-label for="empresa"
                 value="Empresa" />

        <x-input class="block mt-1 w-full"
                 type="text"
                 wire:model="empresa"
                 :value="old('empresa')"
                 required
                 autofocus
                 placeholder="Empresa: Netfil, Uber, Netlify" />

        @error('empresa')
            <x-alert message="{{ $message }}" />
        @enderror
    </div>

    <div>
        <x-label for="last_day"
                 value="Último día para postularse" />

        <x-input class="block mt-1 w-full"
                 type="date"
                 wire:model="last_day"
                 :value="old('last_day')"
                 required
                 autofocus
                 placeholder="Empresa: Netfil, Uber, Netlify" />

        @error('last_day')
            <x-alert message="{{ $message }}" />
        @enderror

    </div>

    <div>
        <x-label for="descripcion"
                 value="Descripción del Puesto" />

        <textarea wire:model="descripcion"
                  placeholder="Descripción general del puesto, experiencia..."
                  class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-72"></textarea>

        @error('descripcion')
            <x-alert message="{{ $message }}" />
        @enderror
    </div>

    <div>
        <x-label for="imagen"
                 value="imagen" />

        <x-input class="block mt-1 w-full"
                 type="file"
                 wire:model="imagen"
                 accept="image/*"
                 required />

        <div class="my-5 w-80">
            @if ($imagen)
                Imagen: 
                <img src="{{$imagen->temporaryUrl()}}" alt="Preview de la Imagen">
            @endif
        </div>
                 
        @error('imagen')
            <x-alert message="{{ $message }}" />
        @enderror
    </div>

    <x-button>Crear Vacante</x-button>
</form>
