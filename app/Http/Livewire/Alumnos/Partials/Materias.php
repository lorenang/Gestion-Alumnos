<?php

namespace App\Http\Livewire\Alumnos\Partials;

use App\Models\Alumnos;
use App\Models\EstadosMaterias;
use App\Models\RegistroEstadosMaterias;
use Exception;
use Livewire\Component;

class Materias extends Component
{

    public $alumno_id;
    public $editEstadoMateria; 

    public function mount($alumno_id): void
    {
        $this->alumno_id = $alumno_id;
        // Inicializar los estados para cada materia
        $alumno = Alumnos::findOrFail($this->alumno_id);
        foreach ($alumno->inscripcionesMaterias as $materia) {
            $this->editEstadoMateria[$materia->materia_id] = $materia->estadoMateria_id;
        }
    }
    public function render()
    {
        $alumno = Alumnos::findOrFail($this->alumno_id);
        $materias = $alumno->inscripcionesMaterias;
        $estadosMaterias = EstadosMaterias::all();
        return view('livewire.alumnos.partials.materias', [
            'alumno' => $alumno,
            'materias' => $materias,
            'estadosMaterias' => $estadosMaterias,
        ]);
    }


    public function editRegistroMateria($id) {
        try {
            $registroMateria = RegistroEstadosMaterias::find($id);
            $registroMateria->update([
                'estadoMateria_id' => $this->editEstadoMateria[$id],
                'usuario' => Auth()->user()->name,
            ]);
            session()->flash('successEditMateria', 'REGISTRO ACTUALIZADO.');
        } catch (Exception $e) {
            session()->flash('errorEditMateria', $e);
        }
    }

    public function deleteRegistroMateria($id) {
        try {
            $registroMateria = RegistroEstadosMaterias::find($id);
            $registroMateria->update([
                'usuario' => Auth()->user()->name,
            ]);
            $registroMateria->delete();
            session()->flash('successDeleteMateria', 'REGISTRO ELIMINADO.');
        } catch (Exception $e) {
            session()->flash('error}DeleteMateria', $e);
        }
    }
}
