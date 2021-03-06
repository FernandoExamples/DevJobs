<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use App\Notifications\NuevoCandidatoNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function postularme()
    {
        $this->validate();

        $filePath = $this->cv->store('cvs', 'public');

        $candidato = Candidato::create([
            'cv' => $filePath,
            'vacante_id' => $this->vacante->id,
            'user_id' => Auth::id(),
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidatoNotification($this->vacante, $candidato));

        return redirect()->back()->with('message', 'Se envió tu información correctamente. ¡Mucha suerte!');
    }

    public function render()
    {
        return view('vacantes.livewire.postular-vacante');
    }
}
