<?php
abstract class Model
{
    protected static $table;
    protected static $orderBy;

    protected static function db()
    {
        return DB::getInstance()->getConnection();
    }

    public static function findAll()
    {
        $db = static::db();

        $stmt = $db->prepare("SELECT * FROM " . static::$table . " ORDER BY " . static::$orderBy);
        $stmt->execute();

        $results = [];

        while ($row = $stmt->fetch()) {
            $results[] = new static($row);
        }

        return $results;
    }

    public static function findById($id)
    {
        $db = static::db();

        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();

        return $row ? new static($row) : null;
    }

    protected function fill($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    abstract public function toArray();
}
