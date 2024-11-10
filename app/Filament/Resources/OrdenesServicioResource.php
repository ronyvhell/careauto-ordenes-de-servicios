<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdenesServicioResource\Pages;
use App\Models\OrdenesServicio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Actions\Action;

class OrdenesServicioResource extends Resource
{
    protected static ?string $model = OrdenesServicio::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Órdenes de Servicio';
    protected static ?string $navigationGroup = 'Gestión de órdenes';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Wizard::make([
                    Wizard\Step::make('Información Básica')
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\Select::make('cliente_id')
                                        ->label('Cliente')
                                        ->relationship('cliente', 'nombre')
                                        ->createOptionForm([
                                            Forms\Components\TextInput::make('nombre')
                                                ->label('Nombre')
                                                ->required(),
                                            Forms\Components\TextInput::make('apellido')
                                                ->label('Apellido')
                                                ->required(),
                                            Forms\Components\TextInput::make('email')
                                                ->label('Correo Electrónico')
                                                ->email()
                                                ->required(),
                                            Forms\Components\TextInput::make('telefono')
                                                ->label('Teléfono')
                                                ->tel()
                                                ->required(),
                                            Forms\Components\TextInput::make('direccion')
                                                ->label('Dirección')
                                                ->required(),
                                            Forms\Components\TextInput::make('documento_identidad')
                                                ->label('Documento de Identidad')
                                                ->required(),
                                        ])
                                        ->createOptionModalHeading('Registrar nuevo Cliente') 
                                        ->required(),
                                        
                                    Forms\Components\Select::make('vehiculo_id')
                                        ->label('Vehículo')
                                        ->relationship('vehiculo', 'placa')
                                        ->createOptionForm([
                                            Forms\Components\TextInput::make('placa')
                                                ->label('Placa')
                                                ->required(),
                                            Forms\Components\TextInput::make('marca')
                                                ->label('Marca')
                                                ->required(),
                                            Forms\Components\TextInput::make('modelo')
                                                ->label('Modelo')
                                                ->required(),
                                            Forms\Components\TextInput::make('año')
                                                ->label('Año')
                                                ->required(),
                                            Forms\Components\TextInput::make('color')
                                                ->label('Color')
                                                ->required(),
                                        ])
                                        ->createOptionModalHeading('Registrar nuevo Vehículo') 
                                        ->required(),
                                    Forms\Components\Select::make('tipo_servicio')
                                        ->label('Tipo de Servicio')
                                        ->options([
                                            'garantía' => 'Garantía',
                                            'reparación' => 'Reparación',
                                            'mantenimiento' => 'Mantenimiento',
                                        ])
                                        ->required(),
                                    Forms\Components\DateTimePicker::make('fecha_creacion')
                                        ->label('Fecha y hora de ingreso')
                                        ->required(),
                                    Forms\Components\Select::make('tecnico_id')
                                        ->label('Técnico Asignado')
                                        ->relationship('tecnico', 'nombre')
                                        ->required(),
                                    Forms\Components\TextInput::make('kilometraje')
                                        ->label('Kilometraje')
                                        ->numeric()
                                        ->required(),
                                    Forms\Components\Select::make('nivel_combustible')
                                        ->label('Nivel de Combustible')
                                        ->options([
                                            'Vacío' => 'Vacío',
                                            'Medio' => 'Medio',
                                            'Completo' => 'Completo',
                                        ])
                                        ->required(),
                                    Forms\Components\Select::make('datos_taller_id')
                                        ->label('Datos del Taller')
                                        ->relationship('datosTaller', 'nombre_taller')
                                        ->required(),
                                    Forms\Components\Select::make('producto_id')
                                        ->label('Productos')
                                        ->relationship('productos', 'nombre')
                                        ->searchable()
                                        ->multiple(),
                                    Forms\Components\Select::make('servicio_id')
                                        ->label('Servicio')
                                        ->relationship('servicios', 'nombre') // Usa el nombre de la relación en plural
                                        ->searchable()
                                        ->multiple(),
                                    Forms\Components\Toggle::make('autorizacion_prueba_ruta')
                                        ->label('Autorización para prueba de ruta')
                                        ->inline(false),
                                    
                                ]),
                        ]),
                    Wizard\Step::make('Detalles del Servicio')
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\TextArea::make('fallas_reportadas')
                                        ->label('Fallas Reportadas')
                                        ->required()
                                        ->placeholder('Describe las fallas reportadas por el cliente'),
                                    Forms\Components\CheckboxList::make('procedimientos_autorizados')
                                        ->label('Procedimientos Autorizados')
                                        ->options([
                                            'Diagnóstico' => 'Diagnóstico',
                                            'Mantenimiento' => 'Mantenimiento',
                                            'Reparación' => 'Reparación',
                                        ])
                                        ->required(),
                                    Forms\Components\CheckboxList::make('verificacion_fluidos')
                                        ->label('Verificación de Fluidos')
                                        ->options([
                                            'Aceite' => 'Aceite',
                                            'Refrigerante' => 'Refrigerante',
                                            'Líquido de Freno' => 'Líquido de Freno',
                                        ])
                                        ->required(),
                                ]),
                        ]),
                    Wizard\Step::make('Inspección')
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\TextArea::make('fallas_detectadas')
                                        ->label('Fallas Detectadas')
                                        ->required()
                                        ->placeholder('Describe las fallas detectadas durante la inspección'),
                                    Forms\Components\TextArea::make('objetos_valor')
                                        ->label('Objetos de Valor Reportados')
                                        ->placeholder('Enumera objetos de valor encontrados en el vehículo'),
                                    Forms\Components\CheckboxList::make('documentos_vehiculo')
                                        ->label('Documentos del Vehículo')
                                        ->options([
                                            'Tarjeta de Propiedad' => 'Tarjeta de Propiedad',
                                            'SOAT' => 'SOAT',
                                            'Tecnomecánica' => 'Tecnomecánica',
                                        ])
                                        ->required(),
                                ]),
                        ]),
                    Wizard\Step::make('Fotos y Costos')
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\FileUpload::make('foto_frente')
                                        ->label('Foto Frontal')
                                        ->required()
                                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                        ->maxSize(1024),
                                    Forms\Components\FileUpload::make('foto_lateral_izquierdo')
                                        ->label('Foto Lateral Izquierdo')
                                        ->required()
                                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                        ->maxSize(1024),
                                    Forms\Components\FileUpload::make('foto_lateral_derecho')
                                        ->label('Foto Lateral Derecho')
                                        ->required()
                                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                        ->maxSize(1024),
                                    Forms\Components\FileUpload::make('foto_atras')
                                        ->label('Foto Trasera')
                                        ->required()
                                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                        ->maxSize(1024),
                                ]),
                        ]),
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('subtotal')
                                ->label('Subtotal')
                                ->numeric()
                                ->disabled(),
                            Forms\Components\TextInput::make('iva')
                                ->label('IVA')
                                ->numeric()
                                ->disabled(),
                            Forms\Components\TextInput::make('total')
                                ->label('Total')
                                ->numeric()
                                ->disabled(),
                        ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente.nombre')
                    ->label('Cliente')
                    ->sortable(),
                Tables\Columns\TextColumn::make('vehiculo.placa')
                    ->label('Vehículo')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_servicio')
                    ->label('Tipo de Servicio')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_creacion')
                    ->label('Fecha de Ingreso')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tecnico.nombre')
                    ->label('Técnico Asignado')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kilometraje')
                    ->label('Kilometraje')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nivel_combustible')
                    ->label('Nivel de Combustible')
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->sortable(),
                Tables\Columns\TextColumn::make('iva')
                    ->label('IVA')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrdenesServicios::route('/'),
            'create' => Pages\CreateOrdenesServicio::route('/create'),
            'edit' => Pages\EditOrdenesServicio::route('/{record}/edit'),
        ];
    }
}
