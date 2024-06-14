<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanResource\Pages;
use App\Filament\Resources\PeminjamanResource\RelationManagers;
use App\Models\Peminjaman;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Data Perpus";
    protected static ?string $pluralModelLabel = 'Peminjaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Peminjaman')
                ->description('')
                ->schema([
                    TextInput::make('nim'),
                    TextInput::make('nama_mahasiswa'),
                    TextInput::make('jumlah_buku_dipinjam'),
                    DatePicker::make('tanggal_peminjaman'),
                    DatePicker::make('tanggal_pengembalian'),
                    TextInput::make('no_hp'),
                    TextInput::make('no_darurat'),
                    TextInput::make('nama_penjaga'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index') ->label('No') ->rowIndex(),
                TextColumn::make('nama_mahasiswa') -> label('Nama Mahasiswa'),
                TextColumn::make('jumlah_buku_dipinjam') -> label('Jumlah Buku Dipinjam'),
                TextColumn::make('tanggal_peminjaman'),
                TextColumn::make('tanggal_pengembalian'),
                TextColumn::make('no_hp'),
                TextColumn::make('no_darurat'),
                TextColumn::make('nama_penjaga'),
                
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
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
