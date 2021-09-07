<?php

namespace App\Constants;

/**
 * AppConstants
 * @package App\Constants
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class AppConstants
{
    /** Contains Common Constants **/
    public const SUCCESS = 'success';
    public const DATA = 'data';
    public const CODE = 'code';
    public const MESSAGE = 'message';
    public const STATE = 'state';
    public const RESPONSE = 'response';
    public const REQUEST = 'request';
    public const COUNT = 'count';
    public const OFFSET = 'offset';
    public const LIMIT = 'limit';
    public const DESC = 'DESC';
    public const SEARCH_KEYWORD = 'search_keyword';

    /** DB Fields **/
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    // blog_page table
    public const PAGE_TAG = 'page_tag';
    public const PAGE_CONFIG_JSON = 'page_config_json';
    // recipe table
    public const PROMOTED_STATUS = 'promoted_status';
    public const RECOMMEND_STATUS = 'recommend_status';
    public const RECOMMEND_VIDEO_STATUS = 'recommend_video_status';
    public const YOUTUBE_VIDEO_ID = 'youtube_video_id';
    public const YOUTUBE_VIDEO_UPLOAD_AT = 'youtube_video_upload_at';
    public const MAIN_IMAGE = 'main_image';
    public const RECIPE_NAME = 'recipe_name';
    public const SHORT_DESCRIPTION = 'short_description';
    public const PROCEDURE = 'procedure';
    public const DESCRIPTION = 'description';
    public const SLUG_NAME = 'slug_name';
    public const INGREDIENTS_JSON = 'ingredients_json';
    public const CATEGORY_JSON = 'category_json';
    public const STATUS = 'status';
    public const NOTES = 'notes';
    // recipe_category table
    public const ID = 'id';
    public const CATEGORY_NAME = 'category_name';
    // gallery table
    public const RECIPE_ID = 'recipe_id';
    public const IMAGE_URL = 'image_url';
    public const IMAGE_CAPTION = 'image_caption';
    public const PROMOTED_FIELDS = [
        self::RECIPE_NAME,
        self::YOUTUBE_VIDEO_ID,
        self::MAIN_IMAGE,
        self::SLUG_NAME
    ];
    public const RECOMMENDED_FIELDS = [
        self::RECIPE_NAME,
        self::SHORT_DESCRIPTION,
        self::MAIN_IMAGE,
        self::SLUG_NAME,
        self::CREATED_AT
    ];
    public const RECOMMENDED_VIDEO_FIELDS = [
        self::RECIPE_NAME,
        self::YOUTUBE_VIDEO_ID,
        self::YOUTUBE_VIDEO_UPLOAD_AT,
        self::CREATED_AT,
        self::SLUG_NAME
    ];
    public const RECIPE_LIST_FIELDS = [
        self::RECIPE_NAME,
        self::MAIN_IMAGE,
        self::INGREDIENTS_JSON,
        self::CATEGORY_JSON,
        self::SLUG_NAME
    ];
    public const TIMELINE_FIELDS = [
        self::ID,
        self::RECIPE_NAME,
        self::MAIN_IMAGE,
        self::SHORT_DESCRIPTION,
        self::DESCRIPTION,
        self::SLUG_NAME,
        self::CREATED_AT
    ];
    public const CATEGORY_FIELDS = [
        self::ID,
        self::CATEGORY_NAME
    ];
    public const RECIPE_BY_SLUG_FIELDS = [
        self::ID,
        self::RECIPE_NAME,
        self::SHORT_DESCRIPTION,
        self::DESCRIPTION,
        self::PROCEDURE,
        self::YOUTUBE_VIDEO_ID,
        self::YOUTUBE_VIDEO_UPLOAD_AT,
        self::MAIN_IMAGE,
        self::INGREDIENTS_JSON,
        self::CATEGORY_JSON,
        self::SLUG_NAME,
        self::NOTES,
        self::CREATED_AT,
    ];
    public const GALLERY_FIELDS = [
        self::RECIPE_ID,
        self::IMAGE_URL,
        self::IMAGE_CAPTION
    ];

    /** Request validations **/
    public const REQUIRED_STRING = 'required|string';
    public const STRING = 'string';
    public const REQUIRED_INT = 'required|int';
    public const NULLABLE = 'nullable';
}
