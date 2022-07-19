<div class="bg-gray-100 p-5 mt-10 flex justify-center flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('message'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 rounded-lg">
            {{ session('message') }}
        </p>
    @endif

    <form wire:submit.prevent='postularme' class="w-96 mt-5">
        <div class="mb-4">
            <x-label for="cv" value="Currículum"></x-label>
            <x-input wire:model="cv" type="file" accept=".pdf" class="block mt-1 w-full" />
        </div>

        @error('cv')
            <x-alert :message="$message"></x-alert>
        @enderror


        <x-button class="my-5">
            Postumlarme
        </x-button>
    </form>
</div>
