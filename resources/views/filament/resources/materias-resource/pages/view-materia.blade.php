<x-filament::page>
    <div class="space-y-6">
        <!-- Información Básica -->
        <x-filament::card>
            <x-slot name="heading">
                {{$materia->materia_nombre}} - {{$materia->carrera->carrera_nombre}}
            </x-slot>
            <div class="space-y-2">
                <p class="text-lg font-semibold">CARGA HORARIA: <span class="font-normal"></span>{{$materia->materia_horasCursado}} HORAS</p>
                <p class="text-lg font-semibold">DURACION: <span class="font-normal">{{ $materia->materia_duracion }}</span></p>
                <p class="text-lg font-semibold">ALUMNOS INSCRIPTOS: <span class="font-normal">{{ $cantidadAlumnos }}</span></p>
            </div>
        </x-filament::card>
</x-filament::page>
