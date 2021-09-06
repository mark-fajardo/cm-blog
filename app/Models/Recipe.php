<?php

namespace App\Models;

use App\Constants\AppConstants;
use App\Libraries\FileUtils;
use Illuminate\Database\Eloquent\Model;

/**
 * Recipe Model
 * @package App\Models
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class Recipe extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'recipe';

    /**
     * Contains hidden fields
     * @var array
     */
    protected $hidden = [
        AppConstants::ID,
    ];

    /**
     * Cast column data.
     * @var string[]
     */
    protected $casts = [
        AppConstants::INGREDIENTS_JSON => 'array',
        AppConstants::CATEGORY_JSON    => 'array',
    ];

    /**
     * Wrap main image with file domain.
     * @param string $sMainImage
     * @return string
     */
    public function getMainImageAttribute(string $sMainImage): string
    {
        return (new FileUtils)->url($sMainImage);
    }
}
