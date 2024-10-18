<div>
    <x-filament::card class="w-1/2">
        <x-slot name="heading">
            FORMULARIO - INSCRIPCION EN MATERIA
        </x-slot>
        <form wire:submit.prevent="inscribirMateriaAlumno">
            <div class="space-y-2">
                <label for="materia" class="text-gray-700 dark:text-gray-300">Selecciona una materia</label>
                <select wire:model="selectedMateria" id="materia"
                    class="block w-full mt-2 p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                    <option class="text-gray-600 dark:text-gray-400" value="" selected>Selecciona una materia
                    </option>
                    @foreach ($materias as $materia)
                        <option class="text-gray-600 dark:text-gray-400" value="{{ $materia->materia_id }}">
                            {{ $materia->materia_nombre }} - {{ $materia->carrera->carrera_nombre }}</option>
                    @endforeach
                </select>
                @error('selectedMateria')
                    <span class="text-red-500 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="space-y-2 mt-4">
                <label for="estado" class="text-gray-700 dark:text-gray-300">Estado</label>
                <select wire:model="selectedEstadoMateria" id="estado"
                    class="block w-full mt-2 p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                    <option class="text-gray-600 dark:text-gray-400" value="" selected>Selecciona un estado
                    </option>
                    @foreach ($estados as $estado)
                        <option value={{ $estado->estadoMateria_id }} class="text-black dark:text-white">
                            {{ $estado->estadoMateria_estado }}</option>
                    @endforeach
                </select>
                @error('selectedEstadoMateria')
                    <span class="text-red-500 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4 flex justify-end">
                <button
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 dark:hover:bg-blue-800 dark:text-white"
                    type="submit">
                    GUARDAR
                </button>
            </div>
        </form>
    </x-filament::card>
</div>
