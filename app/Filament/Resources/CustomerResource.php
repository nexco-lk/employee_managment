<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\FileUpload::make('profile_image')
                    ->label('Profile Image')
                    ->image()
                    ->directory('customer-profile-images')
                    ->required(),

                Forms\Components\TextInput::make('whatsapp_number')
                    ->label('WhatsApp Number')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('website_url')
                    ->label('Website URL')
                    ->url()
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'Active' => 'Active',
                        'Inactive' => 'Inactive',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),

                Tables\Columns\ImageColumn::make('profile_image')
                    ->label('Profile Image'),

                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->label('WhatsApp Number'),

                Tables\Columns\TextColumn::make('website_url')
                    ->label('Website URL'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),

                // Corrected BadgeColumn for 'status'
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Active',   // Green for 'Active'
                        'danger' => 'Inactive',  // Red for 'Inactive'
                    ]),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
