<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Facades\Filament;


class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationLabel = 'Empresas';

    protected static ?string $modelLabel = 'Empresas';

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('company_name')
                        ->label('Nome da empresa')
                        ->required()
                        ->columns(1),

                    Forms\Components\TextInput::make('segment')
                        ->label('Segmento')
                        ->required()
                        ->columns(1),

                    Forms\Components\TextInput::make('address')
                        ->label('Endereço')
                        ->required()
                        ->columns(1),

                    Forms\Components\TextInput::make('city')
                        ->label('Cidade')
                        ->required()
                        ->columns(1),

                    Forms\Components\TextInput::make('state')
                        ->label('Estado')
                        ->required()
                        ->columns(2),

                    Forms\Components\TextInput::make('postal_code')
                        ->label('CEP:')     
                        ->required()                  
                        ->columns(1),
                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')->label('Empresas'),
                Tables\Columns\TextColumn::make('segment')->label('Segmento'),
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
            
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }    
}
