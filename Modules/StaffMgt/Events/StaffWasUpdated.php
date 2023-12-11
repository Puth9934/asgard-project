<?php

namespace Modules\StaffMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Media\Contracts\StoringMedia;

class StaffWasUpdated implements StoringMedia
{
    public $staff;
    public $data;
  /**
   * Create a new event instance.
   *
   */
  public function __construct($staff,array $data)
  {
      $this->data = $data;
      $this->staff = $staff; 
  }

 
  public function getEntity()
  {
      return $this->staff;
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
