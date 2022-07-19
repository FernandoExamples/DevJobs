<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    protected $listeners = ['buscarVacante'];

    private $filteredVacantes = null;

    public function buscarVacante($busqueda, $categoria, $salario)
    {
        $vacantes = Vacante::when($busqueda, function ($query) use ($busqueda) {
            $query->where('titulo', 'like', '%' . $busqueda . '%');
        })
            ->when($busqueda, function ($query) use ($busqueda) {
                $query->orWhere('empresa', 'like', '%' . $busqueda . '%');
            })
            ->when($categoria, function ($query) use ($categoria) {
                $query->where('categoria_id', $categoria);
            })
            ->when($salario, function ($query) use ($salario) {
                $query->where('salario_id', $salario);
            })
            ->paginate(10);


        $this->filteredVacantes = $vacantes;
    }

    public function render()
    {
        $vacantes = $this->filteredVacantes ?? Vacante::paginate(10);
        return view('home.livewire.home-vacantes', compact('vacantes'));
    }
}
