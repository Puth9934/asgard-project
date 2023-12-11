<?php

namespace Modules\Student\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Media\Contracts\StoringMedia;

class StudentWasCreated implements StoringMedia
{
    public $student;
      public $data;
    /**
     * Create a new event instance.
     *
     */
    public function __construct($student,array $data)
    {
        $this->data = $data;
        $this->student = $student; 
    }

   
    public function getEntity()
    {
        return $this->student;
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
