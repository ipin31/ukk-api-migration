<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternshipResource\Pages;
use App\Filament\Resources\InternshipResource\RelationManagers;
use App\Models\Internship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InternshipResource extends Resource
{
    protected static ?string $model = Internship::class;

    protected static ?string $navigationIcon = 'phosphor-paper-plane-tilt';

    protected static ?string $navigationGroup = 'Schools';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('siswa_id')
                    ->label('Nama')
                    ->relationship('student', 'nama') //student = nama model bukan nama field
                    ->required(),

                Select::make('industri_id')
                    ->label('Industri')
                    ->relationship('industri', 'nama') // industri = nama relasi, nama = field dari tabel industri
                    ->required(),

                DatePicker::make('mulai')
                    ->required(),

                DatePicker::make('selesai')
                    ->required()
                    ->afterOrEqual(fn(callable $get) => Carbon::parse($get('mulai'))->addDays(90))
                    ->validationMessages([
                        'after_or_equal' => 'Tanggal selesai harus minimal 90 hari setelah tanggal mulai.',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.nama')->label('Siswa')->searchable(),
                Tables\Columns\TextColumn::make('industri.nama')->label('Industri')->searchable(),
                Tables\Columns\TextColumn::make('industri.guru.nama')
                    ->label('Guru Pembimbing')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mulai')->searchable(),
                Tables\Columns\TextColumn::make('selesai')->searchable(),
                Tables\Columns\TextColumn::make('durasi_hari')
                    ->label('Durasi')
                    ->getStateUsing(function (Internship $record) {
                        if ($record->mulai && $record->selesai) {
                            $mulai = Carbon::parse($record->mulai);
                            $selesai = Carbon::parse($record->selesai);
                            $days = $mulai->diffInDays($selesai);
                            return $days . ' hari';
                        }
                    }),
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
            'index' => Pages\ListInternships::route('/'),
            'create' => Pages\CreateInternship::route('/create'),
            'edit' => Pages\EditInternship::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}
