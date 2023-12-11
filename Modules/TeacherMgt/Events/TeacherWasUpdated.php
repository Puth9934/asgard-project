<?php

namespace Modules\TeacherMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Media\Contracts\StoringMedia;
use Modules\TeacherMgt\Entities\Teacher;

class TeacherWasUpdated implements StoringMedia
{
  /**
     * @var array
     */
    public $teacher;
    public $data;
    /**
     * @var teacher
     */


    public function __construct(Teacher $teacher, array $data)
    {
        $this->data = $data;
        $this->teacher = $teacher;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->teacher;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->teacher;
    }
}
