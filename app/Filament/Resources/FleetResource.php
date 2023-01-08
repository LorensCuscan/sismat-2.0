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

    protected static ?string $navigationLabel = 'Frotas';

    protected static ?string $modelLabel = 'Frotas';

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([

                    Forms\Components\TextInput::make('desc_frota')
                        ->helperText('Carros, caminhões etc...')
                        ->label('Descrição da frota')
                        ->required()
                        ->columnspan(2),   
                                                              
                    Forms\Components\Select::make('company_id')
                        ->relationship('company', 'company_name')
                        ->label('Nome da empresa')
                        ->required()
                        ->columnSpan(2),                                    

                    Forms\Components\TextInput::make('hystory')
                        ->label('Historico')
                        ->required()
                        ->columns(1),

                    Forms\Components\DatePicker::make('dt_manut')
                        ->label('Data da manutenção')         
                        ->required()              
                        ->columns(1),

                        Forms\Components\Radio::make('active')
                        ->required()
                        ->label('Frota em atividade?')
                        ->boolean('Sim', 'Não')
                        ->columns(),


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
                ->label('Nome da empresa'),
                Tables\Columns\BooleanColumn::make('active')
                ->label('Frota ativa?')
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
