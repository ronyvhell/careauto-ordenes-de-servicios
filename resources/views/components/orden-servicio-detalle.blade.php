<x-filament::page>
    {{-- Header Card --}}
    <x-filament::card>
        <!-- Encabezado de la Orden de Servicio -->
        <div class="bg-gray-900 p-4 rounded-t-lg">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <x-heroicon-o-document-text class="w-6 h-6" />
                    <h1 class="text-xl font-semibold">Orden de Servicio ORD-{{$record->id}}</h1>
                </div>
                @php
                $estado = $record->estado;
                $estadoText = '';
                $badgeColor = '';

                switch ($estado) {
                    case 'recibido':
                        $estadoText = 'Recibido';
                        $badgeColor = 'primary';
                        break;
                    case 'diagnostico':
                        $estadoText = 'En Diagnóstico';
                        $badgeColor = 'warning';
                        break;
                    case 'aprobacion':
                        $estadoText = 'Esperando Aprobación';
                        $badgeColor = 'info';
                        break;
                    case 'reparacion':
                        $estadoText = 'En Reparación';
                        $badgeColor = 'success';
                        break;
                    case 'entrega':
                        $estadoText = 'Listo para Entrega';
                        $badgeColor = 'danger';
                        break;
                    case 'entregado':
                        $estadoText = 'Entregado';
                        $badgeColor = 'gray';
                        break;
                    case 'cancelado':
                        $estadoText = 'Cancelado';
                        $badgeColor = 'dark';
                        break;
                    default:
                        $estadoText = 'Desconocido';
                        $badgeColor = 'secondary';
                }
            @endphp

            <x-filament::badge color="{{ $badgeColor }}">
                {{ $estadoText }}
            </x-filament::badge>
            </div>
        </div>

        <!-- Fechas de Ingreso y Finalización -->
        <div class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <div class="text-sm text-gray-500">Fecha de Ingreso</div>
                    <div class="text-lg font-medium">{{$record->created_at}}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-500">Fecha Estimada de Finalización</div>
                    <div class="text-lg font-medium">{{$record->updated_at}}</div>
                </div>
            </div>
        </div>
        </x-filament::card>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

        {{-- Client Card --}}
            <x-filament::card>
                <div class="flex items-center gap-2 mb-4">
                    <x-heroicon-o-user class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                    <h2 class="text-lg font-semibold">Cliente</h2>
                </div>

                <div class="flex flex-col items-center text-center mb-4">
                    <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mb-3">
                        <x-heroicon-o-user class="w-8 h-8 text-gray-400 dark:text-gray-300" />
                    </div>
                    <div class="font-medium text-lg">{{$record->cliente->nombre}} {{$record->cliente->apellido}}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{$record->cliente->telefono}}</div>
                    <div class="text-sm text-primary-600 dark:text-primary-400">{{$record->cliente->email}}</div>
                </div>
            </x-filament::card>
            
        {{-- Vehicle Details Card --}}
        <x-filament::card class="md:col-span-2">
            <div class="flex items-center gap-2 mb-4">
                <x-heroicon-o-truck class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                <h2 class="text-lg font-semibold">Detalles del Vehículo</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Marca/Modelo</div>
                    <div class="font-medium">{{$record->vehiculo->marca}}</div>
                </div>
                
                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Año</div>
                    <div class="font-medium">{{$record->vehiculo->año}}</div>
                </div>

                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Chasis</div>
                    <div class="font-medium">{{$record->vehiculo->numero_chasis}}</div>
                </div>

                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Color</div>
                    <div class="font-medium">{{$record->vehiculo->color}}</div>
                </div>

                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Motor</div>
                    <div class="font-medium">{{$record->vehiculo->numero_motor}}</div>
                </div>

                <div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Kilometraje</div>
                    <div class="font-medium">{{$record->kilometraje}}</div>
                </div>

                <div class="md:col-span-2 mt-2">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Nivel de Combustible</div>
                    <div class="font-medium">{{$record->nivel_combustible}}</div>                   
                </div>
            </div>
        </x-filament::card>

        {{-- Fluid Status Card --}}
        <x-filament::card class="mb-6">
            <div class="flex items-center gap-2 mb-4">
                <x-heroicon-o-beaker class="w-5 h-5 text-gray-500" />
                <h2 class="text-lg font-semibold">Estado de Fluidos</h2>
            </div>

            <div class="grid grid-cols-3 gap-4">
                {{-- Aceite --}}
                <div class="text-center">
                    <x-heroicon-o-beaker
                        class="h-8 w-8 mx-auto mb-2 {{ in_array('Aceite', $record->verificacion_fluidos) ? 'text-success-600 dark:text-success-400' : 'text-danger-600 dark:text-danger-400' }}"
                    />
                    <div class="text-sm font-medium {{ in_array('Aceite', $record->verificacion_fluidos) ? 'text-success-600 font-bold' : 'text-danger-600' }}">
                        Aceite
                    </div>
                    <div class="text-xs {{ in_array('Aceite', $record->verificacion_fluidos) ? 'text-success-600 font-bold' : 'text-danger-600' }}">
                        {{ in_array('Aceite', $record->verificacion_fluidos) ? 'Adecuado' : 'Bajo' }}
                    </div>
                </div>

                {{-- Refrigerante --}}
                <div class="text-center">
                    <x-heroicon-o-fire
                        class="h-8 w-8 mx-auto mb-2 {{ in_array('Refrigerante', $record->verificacion_fluidos) ? 'text-success-600 dark:text-success-400' : 'text-danger-600 dark:text-danger-400' }}"
                    />
                    <div class="text-sm font-medium {{ in_array('Refrigerante', $record->verificacion_fluidos) ? 'text-success-600 font-bold' : 'text-danger-600' }}">
                        Refrigerante
                    </div>
                    <div class="text-xs {{ in_array('Refrigerante', $record->verificacion_fluidos) ? 'text-success-600 font-bold' : 'text-danger-600' }}">
                        {{ in_array('Refrigerante', $record->verificacion_fluidos) ? 'Adecuado' : 'Bajo' }}
                    </div>
                </div>

                {{-- Líquido de Freno --}}
                <div class="text-center">
                    <x-heroicon-o-cog
                        class="h-8 w-8 mx-auto mb-2 {{ in_array('Líquido de Freno', $record->verificacion_fluidos) ? 'text-success-600 dark:text-success-400' : 'text-danger-600 dark:text-danger-400' }}"
                    />
                    <div class="text-sm font-medium {{ in_array('Líquido de Freno', $record->verificacion_fluidos) ? 'text-success-600 font-bold' : 'text-danger-600' }}">
                        Líquido de Freno
                    </div>
                    <div class="text-xs {{ in_array('Líquido de Freno', $record->verificacion_fluidos) ? 'text-success-600 font-bold' : 'text-danger-600' }}">
                        {{ in_array('Líquido de Freno', $record->verificacion_fluidos) ? 'Adecuado' : 'Bajo' }}
                    </div>
                </div>
            </div>
        </x-filament::card>
    </div>

    {{-- Service Details Card --}}
    <x-filament::card class="mt-6">
        <div class="flex items-center gap-2 mb-4">
            <x-heroicon-o-wrench-screwdriver class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            <h2 class="text-lg font-semibold">Detalles del Servicio</h2>
        </div>

        <div class="space-y-6">
            <div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Fallas Reportadas</div>
                <div class="font-medium">{!! $record->fallas_reportadas !!}</div>
            </div>

            <div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Servicio</div>
                <div class="font-medium">{{$record->servicio}}</div>
            </div>
            
            <div>
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Procedimientos Autorizados</div>
            <div class="flex flex-wrap gap-2">
                @foreach($record->procedimientos_autorizados as $procedimiento)
                    <x-filament::badge>{{ $procedimiento }}</x-filament::badge>
                @endforeach
            </div>

            </div>
            <div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Técnico Asignado</div>
                <div class="font-medium">{{ $record->tecnico->nombre ?? 'No asignado' }}</div>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Autorización de Ruta</div>
            <div class="flex items-center gap-2">
                
                @if ($record->autorizacion_prueba_ruta)
                    <x-filament::badge color="success">Si, autorizo para prueba de Ruta</x-filament::badge>
                @else
                    <x-filament::badge color="danger">No, autorizo para prueba de Ruta</x-filament::badge>
                @endif
            </div>

        </div>
    </x-filament::card>

    {{-- Vehicle Documents and Valuables Card --}}
    <x-filament::card class="mt-6">
        <div class="flex items-center gap-2 mb-4">
            <x-heroicon-o-document-text class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            <h2 class="text-lg font-semibold">Documentos y Objetos de Valor</h2>
        </div>

        <div class="space-y-6">
            <div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Documentos del Vehículo</div>
                <div class="flex flex-wrap gap-2">
                    @foreach ($record->documentos_vehiculo as $documento)
                        <x-filament::badge>{{ $documento }}</x-filament::badge>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Objetos de Valor</div>
                <div class="font-medium">{{$record->objetos_valor}}</div>

            </div>
        </div>
    </x-filament::card>

    {{-- Vehicle Photos Card --}}
    <x-filament::card class="mt-6">
        <div class="flex items-center gap-2 mb-4">
            <x-heroicon-o-camera class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            <h2 class="text-lg font-semibold">Fotografías del Vehículo</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
            {{-- Foto de Frente --}}
            <div class="text-center">
                <div class="bg-gray-100 dark:bg-gray-800 aspect-video rounded-lg flex items-center justify-center">
                    @if($record->foto_frente)
                        <img src="{{ asset('storage/' . $record->foto_frente) }}" alt="Foto Frente" class="object-cover rounded-lg w-full h-full">
                    @else
                        <x-heroicon-o-camera class="h-8 w-8 text-gray-400 dark:text-gray-500" />
                    @endif
                </div>
                <p class="font-medium">Frente</p>
            </div>

            {{-- Foto de Atrás --}}
            <div class="text-center">
                <div class="bg-gray-100 dark:bg-gray-800 aspect-video rounded-lg flex items-center justify-center">
                    @if($record->foto_atras)
                        <img src="{{ asset('storage/' . $record->foto_atras) }}" alt="Foto Atrás" class="object-cover rounded-lg w-full h-full">
                    @else
                        <x-heroicon-o-camera class="h-8 w-8 text-gray-400 dark:text-gray-500" />
                    @endif
                </div>
                <p class="font-medium">Atrás</p>
            </div>

            {{-- Foto Lado Izquierdo --}}
            <div class="text-center">
                <div class="bg-gray-100 dark:bg-gray-800 aspect-video rounded-lg flex items-center justify-center">
                    @if($record->foto_lateral_izquierdo)
                        <img src="{{ asset('storage/' . $record->foto_lateral_izquierdo) }}" alt="Foto Lado Izquierdo" class="object-cover rounded-lg w-full h-full">
                    @else
                        <x-heroicon-o-camera class="h-8 w-8 text-gray-400 dark:text-gray-500" />
                    @endif
                </div>
                <p class="font-medium">Lado Izquierdo</p>
            </div>

            {{-- Foto Lado Derecho --}}
            <div class="text-center">
                <div class="bg-gray-100 dark:bg-gray-800 aspect-video rounded-lg flex items-center justify-center">
                    @if($record->foto_lateral_derecho)
                        <img src="{{ asset('storage/' . $record->foto_lateral_derecho) }}" alt="Foto Lado Derecho" class="object-cover rounded-lg w-full h-full">
                    @else
                        <x-heroicon-o-camera class="h-8 w-8 text-gray-400 dark:text-gray-500" />
                    @endif
                </div>
                <p class="font-medium">Lado Derecho</p>
            </div>
        </div>
    </x-filament::card>

    {{-- Orders Section Card --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6"> 
    
    <x-filament::card class="mt-6">
        <div class="flex items-center gap-2 mb-4">
            <x-heroicon-o-document-text class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            <h2 class="text-lg font-semibold">Orden de Servicio</h2>
        </div>

        <div class="flex gap-4">
            <div>
                <a href="{{ asset('storage/' . $record->orden_servicio) }}" download class="w-full">
                    <x-filament::button icon="heroicon-o-arrow-down-tray" color="primary" class="w-full justify-center">
                        Descargar
                    </x-filament::button>
                </a>
            </div>
        </div>
    </x-filament::card>

    <x-filament::card class="mt-6">
        <div class="flex items-center gap-2 mb-4">
            <x-heroicon-o-document-check class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            <h2 class="text-lg font-semibold">Orden de Entrega</h2>
        </div>

        <div class="flex gap-4">
            <div>
                <a href="{{ asset('storage/' . $record->orden_salida) }}" download class="w-full">
                    <x-filament::button icon="heroicon-o-arrow-down-tray" color="success" class="w-full justify-center">
                        Descargar OE-001
                    </x-filament::button>
                </a>
            </div>
        </div>
    </x-filament::card>
    </div>

    

</x-filament::page>