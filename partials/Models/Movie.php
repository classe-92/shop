<?php
include __DIR__ . '/Model.php';
/**
 * Summary of Movie
 */
class Movie extends Model
{
    public $id;
    public $title;
    public $original_title;
    public $nationality;
    public $date;
    public $vote;
    public $image;

    private $availableFlags = [
        'en',
        'it',
        'us'
    ];

    /**
     * Summary of __construct
     * @param mixed $id
     * @param mixed $title
     */
    public function __construct()
    {

    }

    public function getFlag()
    {
        if (in_array($this->nationality, $this->availableFlags)) {
            return "<img src='img/$this->nationality.png' alt='$this->title' class='flag'>";
        } else {
            return "<span>Unknown</span>";
        }
    }


}