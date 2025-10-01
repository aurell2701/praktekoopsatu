<?php 
declare(strict_types=1);

// ================= DATA USER =================
$nama = "Kamuu ";
$waktu = date("Y-m-d H:i:s");

// ================= LIBRARY SYSTEM =================
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

// ================= INIT LIBRARY =================
try {
    $user = new User($nama);
    $library = new Library($user);
} catch(Exception $e) {
    echo "<p style='color:red;'>Error: ".$e->getMessage()."</p>";
}

// ================= HANDLE FORM =================
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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Website Aurell di Hugging Face</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Playfair Display', serif; 
            text-align: center; 
            margin-top: 50px; 
            background: linear-gradient(to bottom, #e6f7ff, #ffffff); 
            color: #2c3e50;
            font-size: 16px;
        }
        .container { 
            max-width: 800px; 
            margin: 0 auto; 
        }
       .box {
            background-color: #FFFFF0; 
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: center;
        }
        .tugas-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1E3A8A; 
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            margin: 3px; 
            cursor: pointer;
        }
        .tugas-btn:hover { background-color: #2563EB; }
        h1 { font-size: 1.8em; font-weight: 700; white-space: nowrap; color: #2C3E50; }
        p { color: #000000; }
        input, select { padding: 6px; margin: 4px; border-radius: 5px; }
        ul { list-style: none; padding: 0; }
        li { margin: 8px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Aurell</h1>
        <p>Halo <strong><?= htmlspecialchars($nama) ?></strong></p>
        
        <div class="box">
            <p>Semoga Bisa <strong> Menambah Pengetahuan Baru </strong> Disini ! </p>
            <a href="latihan1.php" class="tugas-btn">Tugas 1</a>
            <a href="latihan2.php" class="tugas-btn">Tugas 2</a>
            <a href="latihan3.php" class="tugas-btn">Tugas 3</a>
            <a href="tugasmandiri.php" class="tugas-btn">Tugas Mandiri</a>
            <a href="praktek5.php" class="tugas-btn">Belajar Bersama Asdos</a>
            <a href="praktikum5.1.php" class="tugas-btn">Praktikum 5.1</a>
            <a href="praktikum5.2.php" class="tugas-btn">Praktikum 5.2</a>
            <a href="praktikum6.php" class="tugas-btn">Praktikum 6</a>

            <hr>

            <h3>Tambah Buku / Majalah</h3>
            <form method="POST">
                <input type="text" name="title" placeholder="Judul" required>
                <input type="text" name="author" placeholder="Penulis" required>
                <select name="type">
                    <option value="book">Buku</option>
                    <option value="magazine">Majalah</option>
                </select>
                <button type="submit" class="tugas-btn">Tambah</button>
            </form>

            <h3>Daftar Buku</h3>
            <ul>
            <?php foreach($library->listBooks() as $b): ?>
                <li>
                    <?= htmlspecialchars($b->title) ?> by <?= htmlspecialchars($b->author) ?> (<?= get_class($b) ?>)
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="clone_id" value="<?= $b->id ?>">
                        <button type="submit" class="tugas-btn">Clone</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $b->id ?>">
                        <button type="submit" class="tugas-btn">Delete</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="edit_id" value="<?= $b->id ?>">
                        <input type="text" name="edit_title" placeholder="Judul Baru" required>
                        <input type="text" name="edit_author" placeholder="Penulis Baru" required>
                        <button type="submit" class="tugas-btn">Edit</button>
                    </form>
                </li>
            <?php endforeach; ?>
            </ul>

            <h3>Reflection Library</h3>
            <?php reflectObject($library); ?>
        </div>
    </div>
</body>
</html>