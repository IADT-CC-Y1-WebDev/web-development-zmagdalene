<?php
class Publisher extends Model
{
    protected static $table = 'publishers';
    protected static $orderBy = 'name';

    public $id;
    public $name;

    public function __construct($data = [])
    {
        $this->fill($data);
    }

    // Convert to array for JSON output
    public function toArray()
    {
        return get_object_vars($this);
    }
}
