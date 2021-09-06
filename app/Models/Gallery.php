<?php

namespace App\Models;

use App\Constants\AppConstants;
use App\Libraries\FileUtils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Gallery Model
 * @package App\Models
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.06
 */
class Gallery extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'gallery';

    /**
     * Contains hidden fields
     * @var array
     */
    protected $hidden = [
        AppConstants::ID,
        AppConstants::RECIPE_ID,
    ];

    /**
     * Wrap image url with file domain.
     * @param string $sImageUrl
     * @return string
     */
    public function getImageUrlAttribute(string $sImageUrl): string
    {
        return (new FileUtils)->url($sImageUrl);
    }

    /**
     * @return HasOne
     */
    public function recipe()
    {
        return $this->hasOne(Recipe::class, AppConstants::ID, AppConstants::RECIPE_ID);
    }
}
