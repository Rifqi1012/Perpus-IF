<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanResource\Pages;
use App\Filament\Resources\PeminjamanResource\RelationManagers;
// use App\Models\Peminjaman;
use App\Models\PeminjamanBuku;
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

class PeminjamanResource extends Resource
{
    protected static ?string $model = PeminjamanBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Data Peminjaman";
    protected static ?string $pluralModelLabel = 'Peminjaman Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Data Mahasiswa')
                    ->description('')
                    ->collapsible()
                    ->schema([
                        TextInput::make('nim')
                        ->placeholder('-- Masukkan Nim Mahasiswa --'),
                        TextInput::make('nama_mahasiswa')
                        ->placeholder('-- Masukkan Nama Mahasiswa --'),
                    ])->columns(2),

                Section::make('Data Peminjaman')->description('')->collapsible()->schema([
                    Select::make('buku_id')->relationship('buku', 'judul_buku')
                        ->required()
                        ->label('Judul Buku')
                        ->placeholder('-- Masukkan Judul Buku --')
                        ->native(false),
                    DatePicker::make('tanggal_peminjaman'),
                    DatePicker::make('tanggal_pengembalian'),
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
                TextColumn::make('buku.judul_buku')->label('Judul Buku')->alignCenter(),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
