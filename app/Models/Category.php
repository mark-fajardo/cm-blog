<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Category Model
 * @package App\Models
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.29
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'recipe_category';
}
