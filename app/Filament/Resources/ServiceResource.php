<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        Forms\Components\TextInput::make('fleet_id')
                            ->numeric()
                            ->label('Identificação da rota')
                            ->required()
                            ->columns(1),

                        Forms\Components\TextInput::make('service_desc')
                            ->label('Identificação do serviço')
                            ->required()
                            ->columns(1),

                        Forms\Components\TextInput::make('service_type_id')
                            ->numeric()
                            ->label('Numero do tipo de serviço')
                            ->required()
                            ->columns(1),

                        Forms\Components\TextInput::make('maintenance_type_id')
                            ->numeric()
                            ->label('Numero do tipo de manutenção')
                            ->columns(1),

                        Forms\Components\TextInput::make('fleet_id')
                        
                            ->label('Identificação da frota')
                            ->required()
                            ->columns(1),
                        
                        Forms\Components\TextInput::make('maintenance_type_id')
                            ->label('Tipo da manutenção')
                            ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }    
}
