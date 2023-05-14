<?php
include __DIR__ . '/Model.php';
class Book extends Model
{
    public $id;
    public $title;
    public $plot;
    public $cover_image;
    public $price;
    public $start_date;
    public function __construct()
    {
        parent::__construct();
    }

    // public static function all($conn)
    // {
    //     $sql = "SELECT `title`, `cover_image` ,`plot` FROM books";
    //     echo $sql;
    //     $result = $conn->query($sql);
    //     $conn->close();
    //     return $result;

    // }
    public function getPlot()
    {
        return substr($this->plot, 0, 30) . '...';
    }
}