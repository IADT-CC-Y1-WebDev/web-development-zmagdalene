<?php
class Book extends Model
{
    protected static $table = 'books';
    protected static $orderBy = 'title';

    public $id;
    public $title;
    public $author;
    public $publisher_id;
    public $year;
    public $isbn;
    public $description;
    public $cover_filename;

    public function __construct($data = [])
    {
        $this->fill($data);
    }

    // Find books by publisher
    public static function findByPublisher($publisherId)
    {
        $db = static::db();

        $stmt = $db->prepare("SELECT * FROM books WHERE publisher_id = :publisher_id ORDER BY title");
        $stmt->execute(['publisher_id' => $publisherId]);

        $books = [];
        while ($row = $stmt->fetch()) {
            $books[] = new Book($row);
        }

        return $books;
    }

    // Find books by format (requires JOIN with BookFormats table)
    public static function findByFormat($formatId)
    {
        $db = static::db();

        $stmt = $db->prepare("
            SELECT b.*
            FROM books b
            INNER JOIN book_format bf ON b.id = bf.book_id
            WHERE bf.format_id = :format_id
            ORDER BY b.title
        ");
        $stmt->execute(['format_id' => $formatId]);

        $books = [];
        while ($row = $stmt->fetch()) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function save()
    {
        $db = static::db();

        if ($this->id) {
            // Update existing record
            $stmt = $db->prepare("
                UPDATE books
                SET title = :title,
                    author = :author,
                    publisher_id = :publisher_id,
                    year = :year,
                    isbn = :isbn,
                    description = :description,
                    cover_filename = :cover_filename
                WHERE id = :id
            ");

            $params = [
                'title' => $this->title,
                'author' => $this->author,
                'publisher_id' => $this->publisher_id,
                'year' => $this->year,
                'isbn' => $this->isbn,
                'description' => $this->description,
                'cover_filename' => $this->cover_filename,
                'id' => $this->id
            ];
        } else {
            // Insert new record
            $stmt = $db->prepare("
                INSERT INTO books (title, author, publisher_id, year, isbn, description, cover_filename) VALUES (:title, :author, :publisher_id, :year, :isbn, :description, :cover_filename)
                ");

            $params = [
                'title' => $this->title,
                'author' => $this->author,
                'publisher_id' => $this->publisher_id,
                'year' => $this->year,
                'isbn' => $this->isbn,
                'description' => $this->description,
                'cover_filename' => $this->cover_filename,
            ];
        }
        // Execute statement
        $status = $stmt->execute($params);

        // Check for errors
        if (!$status) {
            $error_info = $stmt->errorInfo();
            $message = sprintf(
                "SQLSTATE error code: %d; error message: %s",
                $error_info[0],
                $error_info[2]
            );
            throw new Exception($message);
        }

        // Ensure one row affected
        if ($stmt->rowCount() !== 1) {
            throw new Exception("Failed to save book.");
        }

        // Set ID for new records
        if ($this->id === null) {
            $this->id = $db->lastInsertId();
        }
    }

    public function delete()
    {
        $db = static::db();

        if (!$this->id) {
            return false;
        }

        $stmt = $db->prepare("DELETE FROM books WHERE id = :id");
        $stmt->execute(['id' => $this->id]);
    }


    public function toArray()
    {
        return get_object_vars($this);
    }
}
