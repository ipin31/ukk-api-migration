<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use App\Models\Mentor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Schools';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Perusahaan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('bidang_usaha')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),

                Select::make('guru_id')
                    ->label('Guru Pembimbing')
                    ->relationship('mentor', 'nama',) //mentor = nama model bukan nama field
                    ->options(function ($record) {
                        if ($record) {
                            // Jika sedang edit, tampilkan semua mentor
                            return Mentor::all()->pluck('nama', 'id');
                        } else {
                            // Jika sedang membuat data baru, hanya tampilkan mentor yang belum digunakan
                            $usedGuruIds = Company::pluck('guru_id'); // Ganti YourModel dengan model yang sesuai
                            return Mentor::whereNotIn('id', $usedGuruIds)->pluck('nama', 'id');
                        }
                    })
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Perusahaan')->searchable(),
                Tables\Columns\TextColumn::make('bidang_usaha')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('kontak')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('mentor.nama')->label('Guru Pembimbing')->searchable(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}
