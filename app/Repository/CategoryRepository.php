<?php

namespace App\Repository;

use App\Constants\AppConstants;
use App\Models\Category;

/**
 * CategoryRepository
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.29
 */
class CategoryRepository extends Repository
{
    /**
     * Get all recipe categories.
     * @return array
     */
    public function getAllCategories(): array
    {
        return $this->parseData(Category::select(AppConstants::CATEGORY_FIELDS)
            ->where(AppConstants::STATUS, 1)
            ->get()
        );
    }

    /**
     * Get category by name.
     * @param string $sSearchKeyword
     * @return array
     */
    public function getCategoryByName(string $sSearchKeyword): array
    {
        return $this->parseData(Category::select(AppConstants::ID)
            ->where(AppConstants::STATUS, 1)
            ->whereRaw($this->getRawLikeLower(AppConstants::CATEGORY_NAME), $sSearchKeyword)
            ->get()
        );
    }
}
