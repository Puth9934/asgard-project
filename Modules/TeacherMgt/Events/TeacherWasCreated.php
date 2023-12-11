<?php

namespace Modules\TeacherMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Media\Contracts\StoringMedia;

class TeacherWasCreated implements StoringMedia
{
    public $teacher;
    public $data;
  /**
   * Create a new event instance.
   *
   */
  public function __construct($teacher,array $data)
  {
      $this->data = $data;
      $this->teacher = $teacher; 
  }

 
  public function getEntity()
  {
      return $this->teacher;
  }
   /**
   * Get the channels the event should be broadcast on.
   *
   * @return array
   * 
   */
  public function getSubmissionData()
  {
      return $this->data;
  }
}
