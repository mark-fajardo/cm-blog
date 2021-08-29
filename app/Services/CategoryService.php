<?php

namespace App\Services;

use App\Libraries\DBUtils;
use App\Repository\CategoryRepository;

/**
 * CategoryService
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.29
 */
class CategoryService extends Service
{
    /**
     * Contains page recipe repository
     * @var CategoryRepository
     */
    private $oCategoryRepository;

    /**
     * CategoryService constructor
     * @param CategoryRepository $oCategoryRepository
     */
    public function __construct(CategoryRepository $oCategoryRepository)
    {
        $this->oCategoryRepository = $oCategoryRepository;
    }

    /**
     * Get all categories.
     * @return $this
     */
    public function getAllCategories(): CategoryService
    {
        $aCategories = $this->oCategoryRepository->getAllCategories();
        if (empty($aCategories) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $this->aResponse = DBUtils::formatResponse(true, $aCategories);
        return $this;
    }
}
