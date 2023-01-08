<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceTypeResource\Pages;
use App\Filament\Resources\ServiceTypeResource\RelationManagers;
use App\Models\ServiceType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceTypeResource extends Resource
{
    protected static ?string $model = ServiceType::class;

    protected static ?string $navigationLabel = 'Tipos de serviço';

    protected static ?string $modelLabel = 'Tipos de serviço';

    protected static ?string $navigationIcon = 'heroicon-o-document-search';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('service_type_desc')
                ->label('Descrição do serviço')
                ->required()
                ->columns(1),

                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service_type_desc')
                ->label('Descrição do tipo de serviço'),
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
            'index' => Pages\ListServiceTypes::route('/'),
            'create' => Pages\CreateServiceType::route('/create'),
            'edit' => Pages\EditServiceType::route('/{record}/edit'),
        ];
    }    
}
