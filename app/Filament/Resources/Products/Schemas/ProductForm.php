<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Primary Data')
                    ->schema([
                        FileUpload::make('picture')
                            ->disk('public')
                            ->directory('images')
                            ->image(),
//                            ->acceptedFileTypes([
//                                'image/png',
//                                'image/jpeg'
//                            ]),
                        Section::make('')
                            ->hiddenLabel()
                            ->schema([
                                TextInput::make('title')
                                    ->maxLength(32)
                                    ->required(),
                                TextInput::make('year')
                                    ->numeric()
                                    ->required(),
                                Select::make('tags')
                                    ->relationship('tags', 'Name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable(),
                            ]),
                    ])->columns(2),
                TextArea::make('description')
                    ->required(),

            ])->columns(1);
    }
}
