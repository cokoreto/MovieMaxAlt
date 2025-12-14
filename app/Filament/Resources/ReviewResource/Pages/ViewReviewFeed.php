<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use App\Models\ReviewFeedReply;
use Illuminate\Database\Eloquent\Builder;

class ViewReviewFeed extends ViewRecord implements HasTable
{
    use InteractsWithTable;
    protected static string $resource = ReviewResource::class;

    // Hide the default record form completely
    public function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ReviewFeedReply::query()
                    ->with('user')
                    ->where('review_feed_id', $this->record->id)
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.username')->label('User')->searchable(),
                Tables\Columns\TextColumn::make('text')->label('Reply')->limit(120),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Created')->sortable(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
