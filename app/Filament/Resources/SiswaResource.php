<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'nis')->required()->unique(table: Siswa::class),
                Forms\Components\TextInput::make(name: 'nama_depan')->required(),
                Forms\Components\TextInput::make(name: 'nama_belakang')->required(),
                Forms\Components\TextInput::make(name: 'alamat')->required(),
                Forms\Components\TextInput::make(name: 'jenis_kelamin')->required(),
                Forms\Components\TextInput::make(name: 'agama')->required(),
                Forms\Components\FileUpload::make('foto')->disk('public')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            //FUNGSI INI AKAN MENAMPILKAN FIELD GAMBAR DENGAN REFERENSI KE DISK PUBLIC
            //SILAHKAN CEK config/filesystem.php UNTUK MELIHAT DIRECTORY DARI KEY PUBLIC
            //SECARA DEFAULT ADALAH STORAGE -> APP > PUBLIC
            Tables\Columns\ImageColumn::make('foto'),
            Tables\Columns\TextColumn::make('alamat'),
            Tables\Columns\TextColumn::make('agama'),
            Tables\Columns\TextColumn::make('nama_depan'),
            Tables\Columns\TextColumn::make('nama_belakang'),
            Tables\Columns\TextColumn::make('nis'),
            Tables\Columns\TextColumn::make('jenis_kelamin')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
