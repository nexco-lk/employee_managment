<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The database connection to be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql'; // Specify the connection name

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers'; // Optional: specify the table name if not following Laravel conventions

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_image',
        'whatsapp_number',
        'website_url',
        'description',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Add attributes you want to hide during serialization
    ];
}
