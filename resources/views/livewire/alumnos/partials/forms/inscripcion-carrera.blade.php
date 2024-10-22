<div>
    <x-filament::card class="w-full">
        <x-slot name="heading">
            FORMULARIO - INSCRIPCION EN CARRERA
        </x-slot>
        <form wire:submit.prevent="inscribirAlumnoCarrera">
            <div class="flex space-x-4 items-center">
                <!-- Carrera -->
                <div class="w-1/2">
                    <label for="carrera" class="text-gray-700 dark:text-gray-300">Carrera</label>
                    <select wire:model="selectedCarrera" id="carrera"
                        class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                        <option class="text-gray-600 dark:text-gray-400" value="" selected>Selecciona una carrera
                        </option>
                        @foreach ($carreras as $carrera)
                            <option class="text-gray-600 dark:text-gray-400" value="{{ $carrera->carrera_id }}">
                                {{ $carrera->carrera_nombre }}</option>
                        @endforeach
                    </select>
                    @error('selectedCarrera')
                        <span class="text-red-500 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="w-1/2">
                    <label for="estado" class="text-gray-700 dark:text-gray-300">Estado:</label>
                    <select wire:model="selectedEstadoCarrera" id="estado" class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                        <option class="text-gray-600 dark:text-gray-400" value="" selected>Selecciona un estado</option>
                        <option class="text-gray-600 dark:text-gray-400" value="INSCRIPTO" >INSCRIPTO</option>
                        <option class="text-gray-600 dark:text-gray-400" value="FALTA DOCUMENTACION" >FALTA DOCUMENTACION</option>
                    </select>
                    @error('selectedEstadoCarrera')
                        <span class="text-red-500 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botón -->
                <div class="mt-4 flex justify-end">
                    <button
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 dark:hover:bg-blue-800 dark:text-white"
                        type="submit">
                        GUARDAR
                    </button>
                </div>
            </div>
        </form>

        <!-- Mensajes de exito/error -->
        <div class="flex justify-center mt-4">
            @if (session()->has('successInscripcionCarrera'))
                <div class="text-green-500 dark:text-green-400 mt-2">
                    {{ session('successInscripcionCarrera') }}
                </div>
            @endif
            @if (session()->has('errorInscripcionCarrera'))
                <div class="text-red-500 dark:text-red-400 mt-2">
                    {{ session('errorInscripcionCarrera') }}
                </div>
            @endif
        </div>
    </x-filament::card>
</div>