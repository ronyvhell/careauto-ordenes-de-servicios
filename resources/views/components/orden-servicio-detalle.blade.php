{{-- resources/views/components/service-order-summary.blade.php --}}

<div class="container mx-auto p-4 space-y-6 max-w-6xl">
    <!-- Encabezado de la Orden de Servicio -->
    <div class="bg-gray-900 text-white p-4 rounded-lg">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Orden de Servicio OS-001</h1>
            <span class="bg-secondary text-white text-lg px-4 py-2 rounded-lg">En Proceso</span>
        </div>
    </div>

    <!-- Visualización de la Placa del Vehículo -->
    <div class="flex justify-center">
        <div class="bg-yellow-400 border-2 border-black text-black font-bold py-4 px-8 rounded-lg shadow-md relative">
            <div class="text-4xl tracking-wider">AAA 123</div>
            <div class="text-sm text-center mt-1">CAREAUTO</div>
            <div class="absolute inset-0 border-2 border-black rounded-lg pointer-events-none" style="margin: -2px;"></div>
        </div>
    </div>

    <!-- Información General en un Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Información del Cliente -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Información del Cliente</h2>
            <div class="space-y-2">
                <p><strong>Nombre:</strong> Juan Pérez</p>
                <p><strong>Email:</strong> juan.perez@email.com</p>
                <p><strong>Teléfono:</strong> +51 987 654 321</p>
                <p><strong>Dirección:</strong> Av. Principal 123, Lima</p>
                <p><strong>DNI:</strong> 12345678</p>
            </div>
        </div>

        <!-- Detalles del Vehículo -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Detalles del Vehículo</h2>
            <div class="space-y-2">
                <p><strong>Marca/Modelo:</strong> Toyota Corolla</p>
                <p><strong>Año:</strong> 2020</p>
                <p><strong>Color:</strong> Plata</p>
                <p><strong>Tipo:</strong> Sedán</p>
                <p><strong>Chasis:</strong> 1HGBH41JXMN109186</p>
                <p><strong>Motor:</strong> 1.8L</p>
            </div>
        </div>

        <!-- Detalles del Servicio -->
        <div class="bg-white p-6 rounded-lg shadow md:col-span-2">
            <h2 class="text-xl font-bold mb-4">Detalles del Servicio</h2>
            <div class="space-y-6">
                <div>
                    <label class="block mb-2 font-medium">Fallas Reportadas</label>
                    <textarea rows="3" class="w-full p-2 border rounded-md" placeholder="Describa las fallas reportadas"></textarea>
                </div>
                <div>
                    <label class="block mb-2 font-medium">Servicio</label>
                    <input type="text" class="w-full p-2 border rounded-md" placeholder="Tipo de servicio">
                </div>
                <div>
                    <span class="block mb-2 font-medium">Procedimientos Autorizados</span>
                    <div class="flex space-x-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Diagnóstico</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Mantenimiento</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Reparación</span>
                        </label>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium">Autorización para prueba de ruta</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Inspección -->
        <div class="bg-white p-6 rounded-lg shadow md:col-span-2">
            <h2 class="text-xl font-bold mb-4">Inspección</h2>
            <div class="space-y-6">
                <div>
                    <label class="block mb-2 font-medium">Fallas Detectadas por el Mecánico (Nuevas)</label>
                    <textarea rows="3" class="w-full p-2 border rounded-md" placeholder="Describa las nuevas fallas detectadas"></textarea>
                </div>
                <div>
                    <label class="block mb-2 font-medium">Objetos de Valor Reportados</label>
                    <textarea rows="3" class="w-full p-2 border rounded-md" placeholder="Liste los objetos de valor"></textarea>
                </div>
                <div>
                    <span class="block mb-2 font-medium">Documentos del vehículo</span>
                    <div class="flex space-x-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Tarjeta de propiedad</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">SOAT</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Tecnomecánica</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado de Fluidos -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Estado de Fluidos</h2>
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="space-y-2">
                    <p class="text-sm font-medium">Aceite</p>
                    <p class="text-xs text-gray-500">Adecuado</p>
                </div>
                <div class="space-y-2">
                    <p class="text-sm font-medium">Refrigerante</p>
                    <p class="text-xs text-gray-500">Bajo</p>
                </div>
                <div class="space-y-2">
                    <p class="text-sm font-medium">Frenos</p>
                    <p class="text-xs text-gray-500">Adecuado</p>
                </div>
            </div>
        </div>

        <!-- Fotografías del Vehículo -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Fotografías del Vehículo</h2>
            <div class="grid grid-cols-2 gap-4">
                @foreach(['Frente', 'Atrás', 'Lado Izquierdo', 'Lado Derecho'] as $side)
                    <div class="space-y-1">
                        <div class="bg-gray-100 h-24 rounded-lg flex items-center justify-center">
                            <span class="text-gray-400">📷</span>
                        </div>
                        <p class="text-center text-sm">{{ $side }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Órdenes -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Órdenes</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                    <div class="flex items-center gap-2">
                        <h3 class="font-semibold">Orden de Servicio</h3>
                    </div>
                    <button class="w-full flex items-center justify-center gap-2 px-4 py-2 border rounded-md">
                        Descargar OS-001
                    </button>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                    <div class="flex items-center gap-2">
                        <h3 class="font-semibold">Orden de Entrega</h3>
                    </div>
                    <button class="w-full flex items-center justify-center gap-2 px-4 py-2 border rounded-md">
                        Descargar OE-001
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
