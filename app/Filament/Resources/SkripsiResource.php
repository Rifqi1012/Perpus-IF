<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkripsiResource\Pages;
use App\Filament\Resources\SkripsiResource\RelationManagers;
use App\Models\Skripsi;
use Faker\Provider\ar_EG\Text;
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

class SkripsiResource extends Resource
{
    protected static ?string $model = Skripsi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $pluralModelLabel = 'Data Skripsi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Skripsi')
                    ->description('')
                    ->schema([
                        TextInput::make('kode_skripsi')->required(),
                        TextInput::make('kelompok_keahlian')->required(),
                        TextInput::make('judul_skripsi')->required(),
                        TextInput::make('nama_penulis')->required(),
                        TextInput::make('dosen_pembimbing')->required(),
                        DatePicker::make('tahun_rilis')->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                ->label('No')
                ->rowIndex(),
                TextColumn::make('judul_skripsi') ->searchable(),
                TextColumn::make('nama_penulis') ->searchable(),
                TextColumn::make('dosen_pembimbing') ->searchable(),
                TextColumn::make('kelompok_keahlian') ->searchable(),
                TextColumn::make('tahun_rilis') ->searchable()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSkripsis::route('/'),
            'create' => Pages\CreateSkripsi::route('/create'),
            'edit' => Pages\EditSkripsi::route('/{record}/edit'),
        ];
    }
}
