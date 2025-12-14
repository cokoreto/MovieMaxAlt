<?php

namespace App\Filament\Resources\ReviewResource\RelationManagers;

use App\Models\ReviewFeedReply;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Table;

class RepliesRelationManager extends RelationManager
{
    protected static string $relationship = 'replies';
    protected static ?string $title = 'Replies';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('user.username')->label('User')->searchable(),
                TextColumn::make('text')->label('Reply')->limit(120),
                TextColumn::make('created_at')->dateTime()->label('Created')->sortable(),
            ])
            ->actions([
                DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
