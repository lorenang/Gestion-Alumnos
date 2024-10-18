<div>
    <x-filament::card class="w-full">
        <x-slot name="heading">
            FORMULARIO - INSCRIPCION EN CARRERA
        </x-slot>
        <form wire:submit.prevent="inscribirAlumnoCarrera" class="flex items-center space-x-4">
            <!-- Selección de carrera -->
            <div class="flex items-center space-x-2">
                <label for="carrera" class="text-gray-700 dark:text-gray-300">Carrera:</label>
                <select wire:model="selectedCarrera" id="carrera"
                    class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                    <option class="text-gray-600 dark:text-gray-400" value="" selected>Selecciona una carrera</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->carrera_id }}" class="text-black dark:text-white">
                            {{ $carrera->carrera_nombre }}
                        </option>
                    @endforeach
                </select>
                @error('selectedCarrera')
                    <span class="text-red-500 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <!-- Selección de estado -->
            <div class="flex items-center space-x-2">
                <label for="estado" class="text-gray-700 dark:text-gray-300">Estado:</label>
                <select wire:model="selectedEstadoCarrera" id="estado"
                    class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                    <option class="text-gray-600 dark:text-gray-400" value="" selected>Selecciona un estado</option>
                    <option value="INSCRIPTO" class="text-black dark:text-white">INSCRIPTO</option>
                    <option value="FALTA DOCUMENTACION" class="text-black dark:text-white">FALTA DOCUMENTACION</option>
                </select>
                @error('selectedEstadoCarrera')
                    <span class="text-red-500 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de guardar -->
            <div>
                <button
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 dark:hover:bg-blue-800 dark:text-white"
                    type="submit">
                    GUARDAR
                </button>
            </div>
        </form>

        <!-- Mensajes de éxito/error -->
        <div class="flex justify-center mt-4">
            @if (session()->has('successInscripcionCarrera'))
                <div class="text-green-500 dark:text-green-400 mt-2">
                    {{ session('successInscripcionCarrera') }}
                </div>
            @endif
            @if (session()->has('errorInscripcion'))
                <div class="text-red-500 dark:text-red-400 mt-2">
                    {{ session('errorInscripcion') }}
                </div>
            @endif
        </div>
    </x-filament::card>
</div>