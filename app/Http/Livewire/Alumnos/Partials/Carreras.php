<?php

namespace App\Http\Livewire\Alumnos\Partials;

use App\Models\Alumnos;
use App\Models\InscripcionesCarreras;
use Exception;
use Livewire\Component;

class Carreras extends Component
{

    public $alumno_id;
    public $editEstadoCarrera;

    public $listeners = ['carreraAdd' => 'render'];
    public function mount($alumno_id) {
        $this->alumno_id = $alumno_id;
        // Inicializar los estados para cada materia
        $alumno = Alumnos::findOrFail($this->alumno_id);
        foreach ($alumno->inscripcionesCarreras as $carrera) {
            $this->editEstadoCarrera[$carrera->inscripcionCarrera_id] = $carrera->inscripcionCarrera_estado;
        }
    }
    public function render()
    {
        $alumno = Alumnos::find($this->alumno_id);
        $carreras = $alumno->inscripcionesCarreras;
       
        return view('livewire.alumnos.partials.carreras', [
            'carreras' => $carreras,
        ]);
    }

    public function editRegistroCarrera($id) {
        try {
            $carrera = InscripcionesCarreras::find($id);
            $carrera->update([
                'inscripcionCarrera_estado' => $this->editEstadoCarrera[$id],
                'usuario' => Auth()->user()->name,
            ]);
            session()->flash('successEditCarrera', 'REGISTRO ACTUALZIADO.');
        } catch(Exception $e) {
            session()->flash('errorEditCarrera', $e);
        }
    }


    public function deleteInscripcion($id) {
        try {
            $insCarrera = InscripcionesCarreras::find($id);
            $insCarrera->update([
                'usuario' => Auth()->user()->name,
            ]);
            $insCarrera->delete();
            session()->flash('successDeleteCarrera', 'REGISTRO ELIMINADO.');
        } catch (Exception $e) {
            session()->flash('errorDeleteCarrera', $e);
        }
    }
}
