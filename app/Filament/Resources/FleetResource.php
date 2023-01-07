<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FleetResource\Pages;
use App\Filament\Resources\FleetResource\RelationManagers;
use App\Models\Fleet;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FleetResource extends Resource
{
    protected static ?string $model = Fleet::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([

                    Forms\Components\TextInput::make('fleet_id')
                        ->label('Frota Num:'),
                                                              
                    Forms\Components\Select::make('company_id')
                        ->relationship('company', 'id')
                        ->label('Identificação da empresa')
                        ->required()
                        ->columns(1),

                    Forms\Components\TextInput::make('desc_frota')
                        ->helperText('Carros, caminhões etc...')
                        ->label('Descrição da frota')
                        ->required()
                        ->columnspan(2),

                    Forms\Components\Radio::make('active')
                        ->label('Frota em atividade?')
                        ->boolean('Sim', 'Não')
                        ->columns(),

                    Forms\Components\TextInput::make('hystory')
                        ->label('Historico')
                        ->columns(1),

                    Forms\Components\DatePicker::make('dt_manut')
                        ->label('Data da manutenção')                       
                        ->columns(1),


                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('desc_frota')
                ->label('Descrição da frota'),
                Tables\Columns\TextColumn::make('company.company_name') 
                            
                ->label('Identificação da empresa'),
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
            'index' => Pages\ListFleets::route('/'),
            'create' => Pages\CreateFleet::route('/create'),
            'edit' => Pages\EditFleet::route('/{record}/edit'),
        ];
    }    
}
