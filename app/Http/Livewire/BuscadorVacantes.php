<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class BuscadorVacantes extends Component
{
    public $busqueda;
    public $salario;
    public $categoria;

    public function handleSubmit()
    {
        $this->emit('buscarVacante', $this->busqueda, $this->categoria, $this->salario);
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('home.livewire.buscador-vacantes', compact('salarios', 'categorias'));
    }
}
