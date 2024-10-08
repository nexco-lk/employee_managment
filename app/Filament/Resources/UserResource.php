<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\Select::make('employee_type')->options([
                        'Developer' => 'Developer',
                        'Designer' => 'Designer',
                        'HR' => 'HR',
                        'Founder' => 'Founder',
                ]
                )->required(),

                // Forms\Components\FileUpload::make('profile_image')->required(),
                Forms\Components\FileUpload::make('profile_image')
                ->label('Profile Image')
                ->image()
                ->directory('profile-images')  // Specify the directory for storing the image
                ->required(),

                Forms\Components\TextInput::make('whatsapp_number')
                ->label('WhatsApp Number')
                ->numeric()
                ->required(),

                Forms\Components\TextInput::make('github_url')
                ->label('GitHub URL')
                ->url()
                ->required(),

                Forms\Components\TextInput::make('linkedin_url')
                ->label('LinkedIn URL')
                ->url()
                ->required(),

                Forms\Components\TextInput::make('stackoverflow_url')
                ->label('StackOverflow URL')
                ->url()
                ->required(),

                Forms\Components\DatePicker::make('joined_date')
                ->label('Joined Date')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('email_verified_at'),
                Tables\Columns\SelectColumn::make('employee_type'),
                Tables\Columns\ImageColumn::make('profile_image'),
                Tables\Columns\TextColumn::make('whatsapp_number'),
                Tables\Columns\TextColumn::make('github_url'),
                Tables\Columns\TextColumn::make('linkedin_url'),
                Tables\Columns\TextColumn::make('stackoverflow_url'),
                Tables\Columns\TextColumn::make('joined_date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
