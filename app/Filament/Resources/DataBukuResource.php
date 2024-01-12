<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Forms\FieldSet;
use Filament\Tables;
use App\Models\DataBuku;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Filament\Resources\DataBukuResource\Pages;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataBukuResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class DataBukuResource extends Resource
{
    protected static ?string $model = DataBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $recordTitleAttribute = 'Data Buku';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\FieldSet::make('Detail Buku')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('isbn')->label('ISBN')->required(),
                    Forms\Components\TextInput::make('judul')->label('Judul')->required(),
                    Forms\Components\TextInput::make('nama_pengarang')->label('Nama Pengarang')->required(),
                    Forms\Components\DatePicker::make('tanggal_terbit')->label('Tanggal Terbit')->required() -> native(false),
                    Forms\Components\Select::make('status')->label('Status')->options([
                        'Tersedia' => 'Tersedia',
                        'Dipinjam' => 'Dipinjam'
                    ])->required(),
                ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('isbn') -> label('ISBN'),
                TextColumn::make('judul') -> label('Judul'),
                TextColumn::make('nama_pengarang') -> label('Nama Pengarang'),
                TextColumn::make('tanggal_terbit') -> label('Tanggal Terbit'),
                TextColumn::make('status') -> label('Status'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDataBuku::route('/'),
            'create' => Pages\CreateDataBuku::route('/create'),
            'edit' => Pages\EditDataBuku::route('/{record}/edit'),
        ];
    }
}
