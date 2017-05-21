<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use MaddHatter\LaravelFullcalendar\Event;

class Shipping extends Model implements Event

{
  protected $table = "shipping";
  protected $fillable = ['type' ,'date','idinvoice','created_at','distance','licenseplate'];
  protected $dates = ['date'];

  public function scopeWhereshipping($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }
  public function scopeWheretypeshipping($query,$id)
  {
    $query->where('type','=', $id);
  }

  /**
   * Get the event's title
   *
   * @return string
   */
   public function getTitle()
    {
        return   $this->code.'-'.$this->licenseplate;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return 1;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->date;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->date;
    }

    /**
     * Get the event's ID
     *
     * @return int|string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Optional FullCalendar.io settings for this event
     *
     * @return array
     */
    public function getEventOptions()
    {
        return [
          'color' => '',
        ];
    }
}
