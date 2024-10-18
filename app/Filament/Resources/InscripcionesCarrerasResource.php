<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InscripcionesCarrerasResource\Pages;
use App\Filament\Resources\InscripcionesCarrerasResource\RelationManagers;
use App\Models\InscripcionesCarreras;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InscripcionesCarrerasResource extends Resource
{
    protected static ?string $model = InscripcionesCarreras::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('carrera_id')
                    ->required(),
                Forms\Components\TextInput::make('alumno_id')
                    ->required(),
                Forms\Components\TextInput::make('inscripcionCarrera_legajo')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('inscripcionCarrera_estado')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('usuario')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('carrera_id'),
                Tables\Columns\TextColumn::make('alumno_id'),
                Tables\Columns\TextColumn::make('inscripcionCarrera_legajo'),
                Tables\Columns\TextColumn::make('inscripcionCarrera_estado'),
                Tables\Columns\TextColumn::make('usuario'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
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
            'index' => Pages\ListInscripcionesCarreras::route('/'),
            'create' => Pages\CreateInscripcionesCarreras::route('/create'),
            'edit' => Pages\EditInscripcionesCarreras::route('/{record}/edit'),
        ];
    }    
}
