<?php

class Format extends Model
{
    protected static $table = 'formats';
    protected static $orderBy = 'name';

    public $id;
    public $name;

    public function __construct($data = [])
    {
        $this->fill($data);
    }

    // Find formats by book (requires JOIN with book_format table)
    public static function findByBook($bookId)
    {
        $db = static::db();
        $stmt = $db->prepare("
            SELECT f.*
            FROM formats f
            INNER JOIN book_format bf ON f.id = bf.format_id
            WHERE bf.book_id = :book_id
            ORDER BY f.name
        ");
        $stmt->execute(['book_id' => $bookId]);

        $formats = [];
        while ($row = $stmt->fetch()) {
            $formats[] = new Format($row);
        }

        return $formats;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
