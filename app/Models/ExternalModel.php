<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalModel extends Model
{
    use HasFactory;

    protected $table = 'external_services';

    protected $fillable = [
        'id',
        'domain_id',
        'subject',
        'unisender_send_date_at',
        'created',
        'created_at',
        'updated_at'
    ];
}
