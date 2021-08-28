<?php

namespace App\Constants;

/**
 * AppConstants
 * @package App\Constants
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>>
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

    /** DB Fields **/
    public const CREATED_AT = 'created_at';
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
    public const SLUG_NAME = 'slug_name';
    public const PROMOTED_FIELDS = [
        self::RECIPE_NAME,
        self::YOUTUBE_VIDEO_ID,
        self::MAIN_IMAGE,
        self::SLUG_NAME
    ];
    public const RECOMMENDED_FIELDS = [
        self::RECIPE_NAME,
        self::MAIN_IMAGE,
        self::SLUG_NAME
    ];
    public const RECOMMENDED_VIDEO_FIELDS = [
        self::RECIPE_NAME,
        self::YOUTUBE_VIDEO_ID,
        self::YOUTUBE_VIDEO_UPLOAD_AT,
        self::CREATED_AT,
        self::SLUG_NAME
    ];

    /** Request validations **/
    public const REQUIRED_STRING = 'required|string';
    public const STRING = 'string';
    public const REQUIRED_INT = 'required|int';
}
