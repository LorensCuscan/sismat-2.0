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
                        Forms\Components\Select::make('fleets_id')
                            ->relationship('fleet', 'desc_frota')
                            ->label('Tipo da frota')
                            ->required()
                            ->columns(1),

                        Forms\Components\Select::make('service_types_id')
                            ->relationship('service_type', 'service_type_desc')
                            ->label('Tipo do serviço')
                            ->required()
                            ->columns(1),

                        Forms\Components\Select::make('maintenance_type_id')
                            ->required()
                            ->relationship('maintenance_type', 'desc_manut')
                            ->label('Tipo de manutenção')
                            ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fleet.desc_frota')
                ->label('Descrição da frota'),    
                Tables\Columns\TextColumn::make('service_type.service_type_desc')
                ->label('Decrição do serviço'),      
                Tables\Columns\TextColumn::make('maintenance_type.desc_manut')
                ->label('Descrição da manutenção'),
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
