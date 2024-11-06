<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiculosResource\Pages;
use App\Filament\Resources\VehiculosResource\RelationManagers;
use App\Models\Vehiculos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehiculosResource extends Resource
{
    protected static ?string $model = Vehiculos::class;

    // Edición Módulo
    protected static ?string $navigationIcon = 'heroicon-o-folder'; // Icono del Módulo
    protected static ?string $navigationLabel = 'Vehículos'; // Título del Módulo 
    protected static ?string $navigationGroup = 'Clientes y Vehículos'; // Dividir Módulos en Grupos
    protected static ?int $navitagionSort = 4; // Orden de Aparición en el Menú

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('marca')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('color')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('placa')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tipo_vehiculo')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('numero_chasis')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('numero_motor')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('placa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_vehiculo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_chasis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_motor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListVehiculos::route('/'),
            'create' => Pages\CreateVehiculos::route('/create'),
            'edit' => Pages\EditVehiculos::route('/{record}/edit'),
        ];
    }
}
