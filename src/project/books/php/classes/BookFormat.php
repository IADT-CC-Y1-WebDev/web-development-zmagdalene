<?php

class BookFormat extends Pivot
{
    protected static $table = 'book_format';
    protected static $leftKey = 'book_id';
    protected static $rightKey = 'format_id';
}