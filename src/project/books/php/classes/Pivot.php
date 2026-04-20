<?php
abstract class Pivot
{
    protected static $table;
    protected static $leftKey;
    protected static $rightKey;

    protected static function db()
    {
        return DB::getInstance()->getConnection();
    }

    // Check if a relationship exists
    public static function exists($leftId, $rightId)
    {
        $db = static::db();

        $stmt = $db->prepare("
            SELECT COUNT(*) as count
            FROM " . static::$table .
            " WHERE " . static::$leftKey . " =  :left_id AND " . static::$rightKey . " = :right_id
            ");

        $stmt->execute([
            'left_id' => $leftId,
            'right_id' => $rightId
        ]);

        $row = $stmt->fetch();
        return $row['count'] > 0;
    }

    // Create a new left-right relationship
    public static function create($leftId, $rightId)
    {
        // Check if relationship already exists
        if (static::exists($leftId, $rightId)) {
            return false;
        }

        $db = static::db();
        $stmt = $db->prepare("
            INSERT INTO " . static::$table . " (" . static::$leftKey . ", " . static::$rightKey . ")
            VALUES (:left_id, :right_id)
        ");

        return $stmt->execute([
            'left_id' => $leftId,
            'right_id' => $rightId
        ]);
    }

    // Delete a specific game-platform relationship
    public static function remove($leftId, $rightId)
    {
        $db = static::db();
        $stmt = $db->prepare("
            DELETE FROM " . static::$table . " 
            WHERE " . static::$leftKey . " = :left_id AND " . static::$rightKey . " = :right_id
        ");

        return $stmt->execute([
            'left_id' => $leftId,
            'right_id' => $rightId
        ]);
    }

    // Delete all platform relationships for a specific game
    public static function deleteByLeft($leftId)
    {
        $db = static::db();
        $stmt = $db->prepare("
            DELETE FROM " . static::$table . " 
            WHERE " . static::$leftKey . " = :left_id
        ");
        return $stmt->execute(['left_id' => $leftId]);
    }
}
