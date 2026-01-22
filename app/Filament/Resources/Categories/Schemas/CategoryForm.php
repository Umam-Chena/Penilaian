<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                Repeater::make('products')
                    ->relationship()
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('price')->numeric()->minValue(0)->default(0)->required(),
                        TextInput::make('stock')->numeric()->minValue(0)->default(0)->required(),
                    ])
                    ->columns(2)
                    ->createItemButtonLabel('Add product')
                    ->collapsible(),
            ]);
    }
}
