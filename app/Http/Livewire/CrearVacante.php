<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\User;
use App\Models\Vacante;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    use WithFileUploads;

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $last_day;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'last_day' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function crearVacante()
    {
        $this->validate();

        $imageUrl = ImageService::storeImage($this->imagen, 'vacantes');

        Vacante::create([
            'user_id' => Auth::id(),
            'titulo' => $this->titulo,
            'salario_id' => $this->salario,
            'categoria_id' => $this->categoria,
            'empresa' => $this->empresa,
            'last_day' => $this->last_day,
            'descripcion' => $this->descripcion,
            'imagen' => $imageUrl,
        ]);

        return redirect()->route('vacantes.index')->with('message', 'Vacante publicada correctamente');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('vacantes.crear-vacante', compact('salarios', 'categorias'));
    }
}
