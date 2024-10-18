<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumnosResource\Pages;
use App\Filament\Resources\AlumnosResource\RelationManagers;
use App\Models\Alumnos;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TagsColumn;
class AlumnosResource extends Resource
{
    protected static ?string $model = Alumnos::class;

  
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Alumnos';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('alumno_nombre')->label('Nombre')->required(),
                TextInput::make('alumno_apellido')->label('Apellido')->required(),
                TextInput::make('alumno_dni')->label('D.N.I.')->required(),
                TextInput::make('alumno_telefono')->label('Teléfono')->required(),
                TextInput::make('alumno_correo')->label('Correo')->required(),
                Select::make('alumno_estado')
                    ->label('Estado')
                    ->options([
                        'Activo' => 'Activo',
                        'Inactivo' => 'Inactivo',
                    ])
                    ->required(),
                Hidden::make('usuario')
                    ->default(fn() => auth()->user()->name), // Captura el nombre del usuario autenticado
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('alumno_nombre')->label('Nombre')->sortable()->searchable(),
                TextColumn::make('alumno_apellido')->label('Apellido')->sortable()->searchable(),
                TextColumn::make('alumno_dni')->label('D.N.I.')->sortable()->searchable(),
                TextColumn::make('alumno_correo')->label('Correo')->sortable(),
                TextColumn::make('alumno_telefono')->label('Telefono')->sortable(),
                TextColumn::make('alumno_estado')->label('Estado')->sortable(),
                // TextColumn::make('inscripcionesCarreras') // Asegúrate de que el nombre de la relación sea correcto
                // ->label('Carreras')
                // ->formatStateUsing(fn($state) => $state->pluck('carrera.carrera_nombre')->implode(', ')), 
                
            ])
            ->filters([
                SelectFilter::make('alumno_estado')
                ->options([
                    'Activo' => 'Activo',
                    'Inactivo' => 'Inactivo',
                ])
                ->label('Filtrar por Estado')
                ->placeholder('Todos'),
            ])
            ->actions([
                ViewAction::make()->label('Ver'),
                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar')
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
            'index' => Pages\ListAlumnos::route('/'),
            'create' => Pages\CreateAlumnos::route('/create'),
            'view' => Pages\ViewAlumno::route('/{record}'),
            'edit' => Pages\EditAlumnos::route('/{record}/edit'),
        ];
    }    

    public static function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->with('inscripcionesCarreras');
    }
}
