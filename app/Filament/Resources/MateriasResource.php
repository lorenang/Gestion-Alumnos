<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriasResource\Pages;
use App\Filament\Resources\MateriasResource\RelationManagers;
use App\Models\Carreras;
use App\Models\Materias;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

class MateriasResource extends Resource
{
    protected static ?string $model = Materias::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('carrera_id')
                    ->label('Carrera')
                    ->options(
                        Carreras::all()->map(function ($carrera) {
                            return [
                                'value' => $carrera->carrera_id,
                                'label' => $carrera->carrera_nombre,
                            ];
                        })->pluck('label', 'value')->toArray()
                    )
                    ->searchable()
                    ->required(),
                TextInput::make('materia_nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Materia'),
                TextInput::make('materia_horasCursado')
                    ->required()
                    ->label('Carga horaria'),
                Select::make('materia_duracion')
                    ->label('Duracion')
                    ->options([
                        '1° CUATRIMESTRE' => '1° CUATRIMESTRE',
                        '2° CUATRIMESTRE' => '2° CUATRIMESTRE',
                        'ANUAL' => 'ANUAL',
                    ])
                    ->required(),
                Hidden::make('usuario')
                    ->default(fn() => auth()->user()->name),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('carrera.carrera_nombre')->label('Carrera')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('materia_nombre')->label('Materia')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('materia_horasCursado')->label('C.H.')->sortable(),
                Tables\Columns\TextColumn::make('materia_duracion')->label('Duracion')->sortable(),
            ])
            ->filters([
                SelectFilter::make('materia_duracion')
                ->options([
                    '1° CUATRIMESTRE' => '1° CUATRIMESTRE',
                    '2° CUATRIMESTRE' => '2° CUATRIMESTRE',
                    'ANUAL' => 'ANUAL',
                ])
                ->label('Filtrar por duracion')
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMaterias::route('/create'),
            'view' => Pages\ViewMateria::route('/{record}'),
            'edit' => Pages\EditMaterias::route('/{record}/edit'),
        ];
    }    
}
