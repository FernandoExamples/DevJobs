<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MostrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
        ImageService::deleteImage($vacante->imagen);
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', Auth::id())->paginate(10);
        return view('vacantes.livewire.mostrar-vacantes', compact('vacantes'));
    }
}
