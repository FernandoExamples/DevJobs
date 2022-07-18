<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use App\Services\ImageService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    use WithFileUploads;

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $last_day;
    public $descripcion;
    public $imagen;
    public $imagenActual;

    protected $rules = [
        'titulo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'last_day' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->last_day = Carbon::parse($vacante->last_day)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagenActual = $vacante->imagen;
    }

    public function editarVacante()
    {
        $this->validate();

        if ($this->imagen) {
            $imageUrl = ImageService::storeImage($this->imagen, 'vacantes');
        }

        $vacante = Vacante::find($this->vacante_id);

        $vacante->update([
            'titulo' => $this->titulo,
            'salario_id' => $this->salario,
            'categoria_id' => $this->categoria,
            'empresa' => $this->empresa,
            'last_day' => $this->last_day,
            'descripcion' => $this->descripcion,
            'imagen' => $imageUrl ?? $this->imagenActual,
        ]);

        if ($this->imagen) {
            ImageService::deleteImage($this->imagenActual);
        }

        return redirect()->route('vacantes.index')->with('message', 'Vacante modificada correctamente');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('vacantes.livewire.editar-vacante',  compact('salarios', 'categorias'));
    }
}
