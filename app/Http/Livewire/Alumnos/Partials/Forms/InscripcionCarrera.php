<?php

namespace App\Http\Livewire\Alumnos\Partials\Forms;

use App\Models\Alumnos;
use App\Models\Carreras;
use App\Models\InscripcionesCarreras;
use Exception;
use Livewire\Component;

class InscripcionCarrera extends Component
{

    public $alumno_id;
    public $selectedCarrera = null, $selectedEstadoCarrera = null;
   
    public function mount($alumno_id) {
        $this->alumno_id = $alumno_id;
    }
    public function render()
    {
        $alumno = Alumnos::find($this->alumno_id);
        $carreras = Carreras::all();
        return view('livewire.alumnos.partials.forms.inscripcion-carrera', [
            'alumno' => $alumno,
            'carreras' => $carreras,
        ]);
    }

    public function inscribirAlumnoCarrera(): void
    {
        try {
            $alumno = Alumnos::find($this->alumno_id);

            if ($this->selectedCarrera && $this->selectedEstadoCarrera) {
                $insCarrera = InscripcionesCarreras::where('alumno_id', $alumno->alumno_id)->where('carrera_id', $this->selectedCarrera)->first();

                if($insCarrera !== null) {
                    $this->updateInscripcion($insCarrera);
                } else {
                    InscripcionesCarreras::create([
                        'alumno_id' => $alumno->alumno_id,
                        'carrera_id' => $this->selectedCarrera,
                        'inscripcionCarrera_estado' => $this->selectedEstadoCarrera,
                        'usuario' => Auth()->user()->name,
                    ]);
                    $this->emit('carreraAdd');
                    $this->resetFields();
                    session()->flash('successInscripcionCarrera', 'INSCRIPCION REALIZADA.');
                }
            }
        } catch (Exception $e) {
            session()->flash('errorInscripcion', $e);
        }
    }

    private function resetFields() {
        $this->reset(
            'selectedCarrera',
            'selectedEstadoCarrera'
        );
    }


    private function updateInscripcion($insCarrera) {
        $insCarrera->update([
            'inscripcionCarrera_estado' => $this->selectedEstadoCarrera,
        ]);
        $this->emit('carreraAdd');
        $this->resetFields();
        return redirect()->to('/admin/alumnos/' . $this->alumno_id)->with('successInscripcionCarrera', 'ALUMNO YA SE ENCUENTRA INSCRIPTO. ESTADO ACTUALIZADO.');
    }
}
