<?php

namespace App\Http\Livewire\Alumnos\Partials\Forms;

use App\Models\Alumnos;
use App\Models\EstadosMaterias;
use App\Models\Materias;
use App\Models\RegistroEstadosMaterias;
use Exception;
use Livewire\Component;

class InscripcionMateria extends Component
{
    public $alumno_id;
    public $selectedMateria = null, $selectedEstadoMateria = null, $mostrarNota = false, $nota;
   
    public function mount($alumno_id) {
        $this->alumno_id = $alumno_id;
    }

    public function render()
    {
        $materias = $this->getMateriasCarrerasInscripto();
        $estados = EstadosMaterias::all();

        $estadoSelecc = EstadosMaterias::find($this->selectedEstadoMateria);
        if ($estadoSelecc && strpos($estadoSelecc->estadoMateria_estado, 'APROBADO') !== false) {
            $this->mostrarNota = true;
        }
        return view('livewire.alumnos.partials.forms.inscripcion-materia', [
            'materias' => $materias,
            'estados' => $estados,
        ]);
    }

    private function getMateriasCarrerasInscripto() {
        // Encuentra al alumno con las inscripciones y carreras relacionadas
        $alumno = Alumnos::find($this->alumno_id);
        
        // Obtiene los IDs de las carreras en las que está inscrito
        $carrerasIds = $alumno->inscripcionesCarreras->pluck('carrera_id');
        // Obtiene las materias asociadas a esas carreras
        $materias = Materias::whereIn('carrera_id', $carrerasIds)->get();
        
        return $materias;
    }

    public function inscribirMateriaAlumno() {
        try {
            $alumno = Alumnos::find($this->alumno_id);

            $insMateria = RegistroEstadosMaterias::where('alumno_id', $alumno->alumno_id)->where('materia_id', $this->selectedMateria)->first();

            if ($this->selectedMateria && $this->selectedEstadoMateria) {
                if ($insMateria !== null) {
                    $this->updateInscripcion($insMateria);
                } else {
                    RegistroEstadosMaterias::create([
                        'alumno_id' => $alumno->alumno_id,
                        'materia_id' => $this->selectedMateria,
                        'estadoMateria_id' => $this->selectedEstadoMateria,
                        'materia_nota' => $this->nota,
                        'usuario' => Auth()->user()->name,
                    ]);
                    // Mensaje de éxito
                    $this->emit('materiaAdd');
                    $this->resetFields();
                    session()->flash('successInscripcionMateria', 'INSCRIPCION REALIZADA.');
                }
            }
        } catch (Exception $e) {
            session()->flash('errorInscripcionMateria', $e);
        }
    }

    private function updateInscripcion($insMateria) {
        $insMateria->update([
            'estadoMateria_id' => $this->selectedEstadoMateria,
            'materia_nota' => $this->nota,
            'usuario' => Auth()->user()->name,
        ]);
        $this->emit('materiaAdd');
        $this->resetFields();
        session()->flash('successInscripcionMateria', 'ALUMNO YA SE ENCUENTRA INSCRIPTO. ESTADO ACTUALIZADO.');
    }

    private function resetFields() {
        $this->reset(
            'selectedMateria',
            'selectedEstadoMateria',
            'nota'
        );
    }
}
