<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{
    public Vacante $vacante;
    
    public function render()
    {
        return view('vacantes.livewire.mostrar-vacante');
    }
}
