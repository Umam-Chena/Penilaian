<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->searchable()
                    ->label('Category')
                    ->required(),
                TextInput::make('name'),
                TextInput::make('price')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->prefix('$'),
                TextInput::make('stock')
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
