<x-filament::page>
    <div class="space-y-6">

        <!-- Información Básica -->
        <x-filament::card>
            <x-slot name="heading">
                DATOS PERSONALES
            </x-slot>
            <div class="space-y-2">
                <p class="text-lg font-semibold">Nombre: <span class="font-normal">{{ $alumno->alumno_nombre ?? 'No disponible' }} - {{ $alumno->alumno_apellido ?? 'No disponible' }}</span></p>
                <p class="text-lg font-semibold">DNI: <span class="font-normal">{{ $alumno->alumno_dni ?? 'No disponible' }}</span></p>
                <p class="text-lg font-semibold">Correo Electrónico: <span class="font-normal">{{ $alumno->alumno_correo ?? 'No disponible' }}</span></p>
                <p class="text-lg font-semibold">Teléfono: <span class="font-normal">{{ $alumno->alumno_telefono ?? 'No disponible' }}</span></p>
                <p class="text-lg font-semibold">Estado: <span class="font-normal">{{ $alumno->alumno_estado ?? 'No disponible' }}</span></p>
            </div>
        </x-filament::card>

        <!-- Carreras en las que esta inscripto -->
        @livewire('alumnos.partials.carreras', ['alumno_id' => $alumno->alumno_id])

        <!-- Form para inscribir en carrera -->
        @livewire('alumnos.partials.forms.inscripcion-carrera', ['alumno_id' => $alumno->alumno_id])

        <hr>
        <!-- Materias en las que esta inscripto -->
        @livewire('alumnos.partials.materias', ['alumno_id' => $alumno->alumno_id])

        <!-- Form para inscribir en carrera -->
        @livewire('alumnos.partials.forms.inscripcion-materia', ['alumno_id' => $alumno->alumno_id])
        
    </div>
</x-filament::page>