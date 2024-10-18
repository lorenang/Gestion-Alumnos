<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarrerasResource\Pages;
use App\Filament\Resources\CarrerasResource\RelationManagers;
use App\Models\Carreras;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarrerasResource extends Resource
{
    protected static ?string $model = Carreras::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('carrera_nombre')
                    ->label('Carrera')
                    ->required()
                    ->maxLength(255),
                TextInput::make('carrera_duracion')
                    ->label('Duracion en años')
                    ->required(),
                Hidden::make('usuario')
                    ->default(fn() => auth()->user()->name), // Captura el nombre del usuario autenticado
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('carrera_nombre')->label('Carrera')->sortable()->searchable(),
                TextColumn::make('carrera_duracion')->label('Años')->sortable()->searchable(),
                TextColumn::make('created_at')->label('Alta')
                    ->date(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCarreras::route('/'),
            'create' => Pages\CreateCarreras::route('/create'),
            'view' => Pages\ViewCarrera::route('/{record}'),
            'edit' => Pages\EditCarreras::route('/{record}/edit'),
        ];
    }    
}
