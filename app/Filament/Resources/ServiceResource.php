<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ServiceType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Facades\Filament;
 


class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationLabel = 'Serviços';

    protected static ?string $modelLabel = 'Serviços';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        Forms\Components\Select::make('fleet_id')
                            ->relationship('fleet', 'id')
                            ->label('Identificação da frota')
                            ->required()
                            ->columns(1),

                        Forms\Components\TextInput::make('service_desc')
                            ->label('Identificação do serviço')
                            ->required()
                            ->columns(1),

                        Forms\Components\Select::make('service_type_id')
                            ->relationship('service_type', 'id')
                            ->label('Numero do tipo de serviço')
                            ->required()
                            ->columns(1),

                        Forms\Components\Select::make('maintenance_type_id')
                            ->required()
                            ->relationship('maintenance_type', 'id')
                            ->label('Tipo de manutenção')
                            ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fleet_id')
                ->label('Numero da frota'),    
                Tables\Columns\TextColumn::make('service_desc')
                ->label('Identificação do serviço'),
                Tables\Columns\TextColumn::make('service_type_id')
                ->label('Numero do tipo de serviço'),      
                Tables\Columns\TextColumn::make('maintenance_type_id')
                ->label('Código da manutenção'),
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
