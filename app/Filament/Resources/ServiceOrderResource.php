<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceOrderResource\Pages;
use App\Filament\Resources\ServiceOrderResource\RelationManagers;
use App\Models\ServiceOrder;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceOrderResource extends Resource
{
    protected static ?string $model = ServiceOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\DatePicker::make('order_date')
                            ->label('Data da compra')
                            ->required()
                            ->columns(1),

                        Forms\Components\TextInput::make('service_id')
                            ->required()
                            ->numeric()
                            ->label('Identificação do serviço')
                            ->required()
                            ->columns(1),

                        Forms\Components\DatePicker::make('delivery_date')
                            ->label('Data da entrega')
                            ->required()
                            ->columns(1),

                        Forms\Components\TextInput::make('order_id')
                            ->numeric()
                            ->label('Identificação do pedido')
                            ->columns(1),

                        Forms\Components\TextInput::make('fleet_id')
                        
                            ->label('Identificação da frota')
                            ->required()
                            ->columns(1),
                        
                        Forms\Components\TextInput::make('maintenance_type_id')
                            ->label('Tipo da manutenção')
                            ->columns(1),
                        
                            

                    ])
                    ->columns(2),
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
            'index' => Pages\ListServiceOrders::route('/'),
            'create' => Pages\CreateServiceOrder::route('/create'),
            'edit' => Pages\EditServiceOrder::route('/{record}/edit'),
        ];
    }    
}
