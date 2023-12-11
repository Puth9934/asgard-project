<?php

namespace Modules\Student\Entities;

/**
 * Class Status
 * @package Modules\Blog\Entities
 */
class Gender
{
    const MALE = 0;
    const FEMALE = 1;

    /**
     * @var array
     */
    private $genders = [];

    public function __construct()
    {
        $this->genders = [
            self::MALE => trans('Male'),
            self::FEMALE => trans('Female'),
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->genders;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($genderId)
    {
        if (isset($this->genders[$genderId])) {
            return $this->genders[$genderId];
        }
        return $this->genders[self::MALE];
    }

   
}