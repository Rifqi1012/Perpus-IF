<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanSkripsiResource\Pages;
use App\Filament\Resources\PeminjamanSkripsiResource\RelationManagers;
use App\Models\PeminjamanSkripsi;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeminjamanSkripsiResource extends Resource
{
    protected static ?string $model = PeminjamanSkripsi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Data Peminjaman";

    protected static ?string $pluralModelLabel = 'Peminjaman Skripsi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Mahasiswa')
                    ->description('')
                    ->collapsible()
                    ->schema([
                        TextInput::make('nim')->required()
                        ->placeholder('-- Masukkan Nim Mahasiswa --')
                        ->required(),
                        TextInput::make('nama_mahasiswa')
                        ->placeholder('Masukkan Nama Mahasiswa --')
                        ->required(),
                    ])->columns(2),

                Section::make('Data Peminjaman')
                    ->description('')
                    ->collapsible()
                    ->schema([
                        Select::make('skripsi_id')->relationship('skripsi', 'judul_skripsi')
                            ->required()
                            ->label('Judul Skripsi')
                            ->placeholder('-- Masukkan Judul Skripsi --')
                            ->native(false),
                        DatePicker::make('tanggal_peminjaman')
                            ->placeholder('-- Masukkan Tanggal Peminjaman --'),
                        DatePicker::make('tanggal_pengembalian')
                            ->placeholder('-- Masukkan Tanggal Pengembalian --'),
                        TextInput::make('no_hp')
                            ->placeholder('-- Masukkan No Hp/Whatsapp Aktif --'),
                        TextInput::make('no_darurat')
                            ->placeholder('-- Masukkan No Hp/Whatsapp Darurat --'),
                        TextInput::make('nama_penjaga')
                            ->placeholder('-- Masukkan Nama Penjaga --'),

                    ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->label('No')->rowIndex()->alignCenter(),
                TextColumn::make('skripsi.judul_skripsi')->label('Judul Skripsi')->alignCenter(),
                TextColumn::make('nama_mahasiswa')->alignCenter(),
                TextColumn::make('tanggal_peminjaman')->alignCenter(),
                TextColumn::make('tanggal_pengembalian')->alignCenter(),
                TextColumn::make('no_hp')->alignCenter(),
                TextColumn::make('no_darurat')->alignCenter(),
                TextColumn::make('nama_penjaga')->alignCenter(),
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
            'index' => Pages\ListPeminjamanSkripsis::route('/'),
            'create' => Pages\CreatePeminjamanSkripsi::route('/create'),
            'edit' => Pages\EditPeminjamanSkripsi::route('/{record}/edit'),
        ];
    }
}
