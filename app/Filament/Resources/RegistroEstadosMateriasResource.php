<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroEstadosMateriasResource\Pages;
use App\Filament\Resources\RegistroEstadosMateriasResource\RelationManagers;
use App\Models\RegistroEstadosMaterias;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroEstadosMateriasResource extends Resource
{
    protected static ?string $model = RegistroEstadosMaterias::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('alumno_id')
                    ->required(),
                Forms\Components\TextInput::make('materia_id')
                    ->required(),
                Forms\Components\TextInput::make('usuario')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('materia_nota'),
                Forms\Components\TextInput::make('estadoMateria_id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alumno_id'),
                Tables\Columns\TextColumn::make('materia_id'),
                Tables\Columns\TextColumn::make('usuario'),
                Tables\Columns\TextColumn::make('materia_nota'),
                Tables\Columns\TextColumn::make('estadoMateria_id'),
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
            'index' => Pages\ListRegistroEstadosMaterias::route('/'),
            'create' => Pages\CreateRegistroEstadosMaterias::route('/create'),
            'edit' => Pages\EditRegistroEstadosMaterias::route('/{record}/edit'),
        ];
    }    
}
