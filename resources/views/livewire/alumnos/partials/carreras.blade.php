<div>
    <x-filament::card>
        <x-slot name="heading">
            CARRERAS
        </x-slot>
        <div class="space-y-2">
            <!-- Tabla de materias en las que se encuentra registrado -->
            @if($carreras->isNotEmpty())
                <table class="table-auto w-full text-left">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Fecha</th>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Carrera</th>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Legajo</th>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Estado</th>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carreras as $carrera)
                            <tr class="bg-white dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">
                                    {{ date('d/m/y', strtotime($carrera->created_at)) }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">
                                    {{ $carrera->carrera->carrera_nombre ?? 'No disponible' }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">
                                    {{ $carrera->inscripcionCarrera_legajo ?? 'No disponible' }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">
                                    <select wire:model="editEstadoCarrera.{{ $carrera->inscripcionCarrera_id }}"
                                        class="block w-full mt-2 p-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500 text-black dark:text-white bg-white dark:bg-gray-800">
                                        <option value="INSCRIPTO" @if($carrera->inscripcionCarrera_estado === 'INSCRIPTO') selected @endif>
                                            INSCRIPTO
                                        </option>
                                        <option value="FALTA DOCUMENTACION" @if($carrera->inscripcionCarrera_estado === 'FALTA DOCUMENTACION') selected @endif>
                                            FALTA DOCUMENTACION
                                        </option>
                                        <option value="GRADUADO" @if($carrera->inscripcionCarrera_estado === 'GRADUADO') selected @endif>
                                            GRADUADO
                                        </option>
                                        <option value="ABANDONADO" @if($carrera->inscripcionCarrera_estado === 'ABANDONADO') selected @endif>
                                            ABANDONADO
                                        </option>
                                    </select>
                                </td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-200">
                                    <button wire:click="editRegistroCarrera({{ $carrera->inscripcionCarrera_id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button wire:click="deleteInscripcion({{$carrera->inscripcionCarrera_id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <span>NO SE ENCUENTRA INSCRIPTO EN ALGUNA CARRERA</span>
            @endif
        </div>

        <div class="flex justify-center mt-4">
            @if (session()->has('successEditCarrera'))
                <div class="text-green-500 dark:text-green-400 mt-2">
                    {{ session('successEditCarrera') }}
                </div>
            @endif
            @if (session()->has('errorEditCarrera'))
                <div class="text-red-500 dark:text-red-400 mt-2">
                    {{ session('errorEditCarrera') }}
                </div>
            @endif

            @if (session()->has('successDeleteCarrera'))
                <div class="text-green-500 dark:text-green-400 mt-2">
                    {{ session('successDeleteCarrera') }}
                </div>
            @endif
            @if (session()->has('errorDeleteCarrera'))
                <div class="text-red-500 dark:text-red-400 mt-2">
                    {{ session('errorDeleteCarrera') }}
                </div>
            @endif
        </div>
    </x-filament::card>
</div>