<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()
    {
        $vacantes = Vacante::where('user_id', Auth::id())->paginate(10);
        return view('vacantes.livewire.mostrar-vacantes', compact('vacantes'));
    }
}
