<?php
declare(strict_types=1);

// ---------------- TRAIT ----------------
trait Loggable {
    public function log(string $message): void {
        echo "<p style='color:green;'>[LOG] $message</p>";
    }
}

// ---------------- MODEL ----------------
abstract class Model {
    abstract public function save(): bool;
}

// ---------------- POLYMORPHISM: Book & Magazine ----------------
class Book extends Model {
    use Loggable;

    public const TYPE = "Book";
    private static int $count = 0;
    public int $id;
    public string $title;
    public string $author;

    public function __construct(string $title, string $author) {
        self::$count++;
        $this->id = self::$count;
        $this->title = $title;
        $this->author = $author;
    }

    public function save(): bool {
        $this->log("Buku '{$this->title}' berhasil disimpan!");
        return true;
    }

    public static function count(): int { return self::$count; }

    public function __clone() {
        self::$count++;
        $this->id = self::$count;
    }

    public function __toString(): string {
        return "{$this->id}. {$this->title} by {$this->author}";
    }
}

class Magazine extends Book {
    public function save(): bool {
        $this->log("Majalah '{$this->title}' berhasil disimpan!");
        return true;
    }
}

// ---------------- USER ----------------
class User {
    private string $name;

    public function __construct(string $name) {
        if(empty($name)) throw new Exception("Nama tidak boleh kosong");
        $this->name = $name;
    }

    public function borrow(Book $book): void {
        echo "<p>{$this->name} meminjam '{$book->title}'</p>";
    }

    public function __toString(): string {
        return "User: {$this->name}";
    }
}

// ---------------- LIBRARY ----------------
class Library {
    public array $books = [];
    public User $user;
    private string $file = "books.dat";

    public function __construct(User $user) {
        $this->user = $user;
        $this->load();
    }

    public function addBook(Book $book): void {
        $this->books[$book->id] = $book;
        $book->save();
        $this->save();
    }

    public function updateBook(int $id, string $title, string $author): void {
        if(isset($this->books[$id])){
            $this->books[$id]->title = $title;
            $this->books[$id]->author = $author;
            $this->books[$id]->save();
            $this->save();
        }
    }

    public function deleteBook(int $id): void {
        if(isset($this->books[$id])){
            unset($this->books[$id]);
            echo "<p>Buku dengan ID $id dihapus!</p>";
            $this->save();
        }
    }

    public function cloneBook(int $id): void {
        if(isset($this->books[$id])){
            $clone = clone $this->books[$id];
            $this->addBook($clone);
            echo "<p>Buku '{$clone->title}' dikloning dengan ID baru {$clone->id}</p>";
        }
    }

    public function listBooks(): array { return $this->books; }

    // ---------------- SERIALIZATION ----------------
    private function save(): void {
        file_put_contents($this->file, serialize($this->books));
    }

    private function load(): void {
        if(file_exists($this->file)){
            $this->books = unserialize(file_get_contents($this->file)) ?: [];
        }
    }
}

// ---------------- ANONYMOUS CLASS ----------------
$guest = new class("Guest User") {
    private string $name;
    public function __construct(string $name){ $this->name = $name; }
    public function greet(){ echo "<p>Hello, {$this->name}!</p>"; }
};

// ---------------- REFLECTION ----------------
function reflectObject(object $obj){
    $reflection = new ReflectionClass($obj);
    echo "<h4>Reflection: ". $reflection->getName() ."</h4>";
    echo "<b>Properties:</b><ul>";
    foreach($reflection->getProperties() as $prop) echo "<li>" . $prop->getName() . "</li>";
    echo "</ul><b>Methods:</b><ul>";
    foreach($reflection->getMethods() as $method) echo "<li>" . $method->name . "</li>";
    echo "</ul>";
}

// ---------------- HANDLE FORM ----------------
if(!isset($library)){
    $user = new User("Aurell");
    $library = new Library($user);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['title'], $_POST['author'])){
        $type = $_POST['type'] ?? 'book';
        if($type === 'magazine') $book = new Magazine($_POST['title'], $_POST['author']);
        else $book = new Book($_POST['title'], $_POST['author']);
        $library->addBook($book);
    }
    if(isset($_POST['clone_id'])) $library->cloneBook((int)$_POST['clone_id']);
    if(isset($_POST['delete_id'])) $library->deleteBook((int)$_POST['delete_id']);
    if(isset($_POST['edit_id'], $_POST['edit_title'], $_POST['edit_author'])) 
        $library->updateBook((int)$_POST['edit_id'], $_POST['edit_title'], $_POST['edit_author']);
}
?>