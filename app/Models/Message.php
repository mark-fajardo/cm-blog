<?php

namespace App\Models;

use App\Constants\AppConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Message Model
 * @package App\Models
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.09
 */
class Message extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'message';

    /**
     * Fillable fields.
     * @var string[]
     */
    protected $fillable = AppConstants::MESSAGE_CREATE_FIELDS;
}
