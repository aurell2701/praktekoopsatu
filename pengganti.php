<?php
// =====================================================
// PHP OOP Demo: Semua Materi Sekaligus
// =====================================================

// ---------------------------
// 1. Namespace & Autoloading
// ---------------------------
namespace Aurell\OOPDemo;

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// ---------------------------
// 2. Trait
// ---------------------------
trait LoggerTrait {
    public function log($message) {
        echo "[LOG]: $message <br>";
    }
}

// ---------------------------
// 3. Interface & Abstract Class (Polymorphism)
// ---------------------------
interface TaskInterface {
    public function createTask(string $name, string $desc);
    public function listTasks();
}

abstract class AbstractTask implements TaskInterface {
    protected array $tasks = [];

    abstract public function taskCount(): int;
}

// ---------------------------
// 4. Parent Class
// ---------------------------
class TaskManager extends AbstractTask {
    use LoggerTrait; // pakai trait

    // 5. Scope & Encapsulation
    public string $managerName;
    protected int $taskCounter = 0;
    private array $secretNotes = [];

    // 6. Class Constant
    const VERSION = "1.0";

    // 7. Static Property & Method
    public static int $globalTaskCount = 0;

    // 8. Constructor & Destructor (Magic Methods)
    public function __construct(string $name) {
        $this->managerName = $name;
        $this->log("TaskManager '$name' dibuat");
    }

    public function __destruct() {
        $this->log("TaskManager '{$this->managerName}' dihancurkan");
    }

    // 9. Getter & Setter (Encapsulation)
    public function setSecretNote(string $note) {
        $this->secretNotes[] = $note;
    }

    public function getSecretNotes(): array {
        return $this->secretNotes;
    }

    // 10. CRUD Methods
    public function createTask(string $name, string $desc) {
        $this->taskCounter++;
        self::$globalTaskCount++;
        $id = $this->taskCounter;
        $this->tasks[$id] = ['name'=>$name,'desc'=>$desc];
        $this->log("Task '$name' dibuat");
    }

    public function listTasks() {
        foreach ($this->tasks as $id=>$task) {
            echo "[$id] {$task['name']} - {$task['desc']}<br>";
        }
    }

    public function updateTask(int $id, string $name, string $desc) {
        if(isset($this->tasks[$id])) {
            $this->tasks[$id] = ['name'=>$name,'desc'=>$desc];
            $this->log("Task ID $id diupdate");
        }
    }

    public function deleteTask(int $id) {
        if(isset($this->tasks[$id])) {
            unset($this->tasks[$id]);
            $this->log("Task ID $id dihapus");
        }
    }

    // 11. Override Abstract Method
    public function taskCount(): int {
        return count($this->tasks);
    }

    // 12. Magic Methods __get, __set
    public function __get($name) {
        return $this->$name ?? "Property '$name' tidak ada";
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    // 13. Magic __toString
    public function __toString() {
        return "TaskManager: {$this->managerName} dengan {$this->taskCount()} tugas";
    }

    // 14. Magic __call
    public function __call($name, $arguments) {
        echo "Method '$name' tidak ditemukan dengan argumen: " . implode(", ", $arguments) . "<br>";
    }

    // 15. Magic __sleep & __wakeup
    public function __sleep() {
        return ['managerName', 'tasks']; // simpan properti ini
    }

    public function __wakeup() {
        $this->log("TaskManager '{$this->managerName}' di-unserialize");
    }

    // 16. Late Static Binding
    public static function who() {
        echo "Saya TaskManager versi ".self::VERSION."<br>";
    }

    public static function whoLate() {
        echo "Saya TaskManager versi ".static::VERSION."<br>";
    }
}

// ---------------------------
// 17. Child Class (Inheritance & Final Example)
// ---------------------------
class AdvancedTaskManager extends TaskManager {
    public const VERSION = "2.0"; // override constant
    final public function finalMethod() {
        echo "Ini final method, tidak bisa di override<br>";
    }

    // Override method
    public function createTask(string $name, string $desc) {
        parent::createTask($name,$desc);
        echo "AdvancedTaskManager menambahkan task dengan logging tambahan<br>";
    }
}

// ---------------------------
// 18. Dependency Injection
// ---------------------------
class User {
    public function __construct(public string $username) {}
}

class App {
    public function __construct(public User $user, public TaskManager $tm) {}

    public function run() {
        echo "User: {$this->user->username} sedang mengelola tugas<br>";
    }
}

// ---------------------------
// 19. Object Iteration
// ---------------------------
class TaskCollection implements IteratorAggregate {
    private array $tasks = [];
    public function addTask($task) { $this->tasks[] = $task; }
    public function getIterator(): Traversable {
        return new ArrayIterator($this->tasks);
    }
}

// ---------------------------
// 20. Cloning Object
// ---------------------------
$tm1 = new TaskManager("Kamuu");
$tm1->createTask("Latihan 1","Belajar PHP OOP");
$tm1->setSecretNote("Ini rahasia!");

$tm2 = clone $tm1; // clone
$tm2->managerName = "KamuClone";
$tm2->createTask("Latihan 2","Belajar MVC");

// ---------------------------
// 21. Anonymous Class
// ---------------------------
$anon = new class {
    public function hello() { echo "Halo dari Anonymous Class!<br>"; }
};

// ---------------------------
// 22. Exception Handling
// ---------------------------
try {
    $tm1->deleteTask(999); // tidak ada, akan aman tapi bisa throw exception
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
} finally {
    echo "Try-catch selesai<br>";
}

// ---------------------------
// 23. Serialization
// ---------------------------
$serialized = serialize($tm1);
$tmUnserialized = unserialize($serialized);

// ---------------------------
// 24. Reflection
// ---------------------------
$reflect = new \ReflectionClass($tm1);
echo "Class ".$reflect->getName()." memiliki properti: ";
foreach($reflect->getProperties() as $prop){
    echo $prop->getName()." ";
}
echo "<br>";

// ---------------------------
// Menjalankan semua
// ---------------------------
$tm1->listTasks();
echo "<br>";
$tm2->listTasks();
echo "<br>";
echo $tm1."<br>";
$anon->hello();
$app = new App(new User("Aurell"), $tm1);
$app->run();