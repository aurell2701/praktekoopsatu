<?php
echo "FoodHub<br>";

// (1) Scope
class MenuItem {
    public $nama;
    protected $stok;
    private $harga;

    public function __construct($nama, $harga, $stok) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getStok() {
        return $this->stok;
    }
}

$item1 = new MenuItem("Burger", 30000, 5);
echo "Menu: {$item1->nama}, Harga: {$item1->getHarga()}, Stok: {$item1->getStok()}<br>";

// (2) Encapsulation
class Customer {
    private $nama;
    private $saldo;

    public function __construct($nama, $saldo) {
        $this->nama = $nama;
        $this->saldo = $saldo;
    }

    public function getNama() { return $this->nama; }
    public function getSaldo() { return $this->saldo; }
}
$customer = new Customer("Aurell", 100000);
echo "Customer: {$customer->getNama()}, Saldo: {$customer->getSaldo()}<br>";

// (3) Magic Methods
class Keranjang {
    private $items = [];
    public function __construct() { echo "Keranjang dibuat<br>"; }
    public function __destruct() { echo "Keranjang selesai<br>"; }
    public function __get($name) { return $this->items[$name] ?? null; }
    public function __set($name, $value) { $this->items[$name] = $value; }
    public function __toString() { return implode(",", $this->items); }
    public function __call($name, $args) {
        echo "Panggil $name dengan " . implode(", ", $args) . "<br>";
    }
}
$cart = new Keranjang();
$cart->menu = "Burger";
echo $cart->menu . "<br>";
echo "Keranjang punya " . count([$cart->menu]) . " item<br>";
$cart->checkout(60000, "Cash");

// (4) Inheritance
class Pegawai {
    public $nama;
    public function __construct($nama) { $this->nama = $nama; }
}
class Driver extends Pegawai {
    public function getInfo() { echo "Driver: {$this->nama}<br>"; }
}
$driver = new Driver("Andi");
$driver->getInfo();

// (5) Class Constants
class FoodHub {
    const APP = "FoodHub!";
}
echo "Selamat datang di " . FoodHub::APP . "<br>";

// (6) Late Static Binding
class Base { public static function siapa() { echo "Base"; } }
class Turunan extends Base { public static function siapa() { echo "Turunan"; } }
Base::siapa(); echo " vs "; Turunan::siapa(); echo "<br>";

// (7) Final
final class Dapur {
    public function masak($menu) { echo "Dapur memasak $menu<br>"; }
}
$dapur = new Dapur();
$dapur->masak("Burger");

// (8) Type Hinting
function hitungTotal(int $harga, int $qty): int { return $harga * $qty; }
echo "Total bayar: " . hitungTotal(30000, 2) . "<br>";

// (9) Exception Handling
try {
    $stok = 0;
    if ($stok <= 0) throw new Exception("Stok habis!");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
} finally {
    echo "Cek stok selesai<br>";
}

// (10) Trait
trait Promo {
    public function hitungDiskon($harga) { return $harga * 0.9; }
}
class Transaksi { use Promo; }
$trans = new Transaksi();
echo "Harga promo: " . $trans->hitungDiskon(60000) . "<br>";

// (11) Polymorphism
interface Pembayaran { public function proses($jumlah); }
class BayarCash implements Pembayaran {
    public function proses($jumlah) { echo "Bayar Cash: $jumlah<br>"; }
}
class BayarEwallet implements Pembayaran {
    public function proses($jumlah) { echo "Bayar Ewallet: $jumlah<br>"; }
}
(new BayarCash())->proses(60000);
(new BayarEwallet())->proses(60000);

// (12) Static
class Counter {
    public static $jumlah = 0;
    public static function tambah() { self::$jumlah++; }
}
Counter::tambah();
Counter::tambah();
echo "Jumlah transaksi: " . Counter::$jumlah . "<br>";

// (13) Namespace
namespace FoodHubApp;
class Menu { public function show() { echo "Menu dari namespace FoodHub<br>"; } }
(new \FoodHubApp\Menu())->show();

namespace { // balik ke global

// (14) CRUD / MVC
class ModelMenu {
    private $data = [];
    public function create($menu) { $this->data[] = $menu; }
    public function read() { return $this->data; }
}
$model = new ModelMenu();
$model->create("Es Teh");
echo "CRUD Read: " . implode(", ", $model->read()) . "<br>";

// (15) Serialization
$seri = serialize($item1);
echo "Serialized: $seri<br>";
$obj = unserialize($seri);
echo "Unserialized: " . $obj->nama . "<br>";

// (16) Iteration
class DaftarMenu implements \IteratorAggregate {
    private $menu = ["Nasi","Ayam","Es Teh"];
    public function getIterator(): Traversable { return new ArrayIterator($this->menu); }
}
foreach (new DaftarMenu() as $m) { echo "Menu: $m<br>"; }

// (17) Reflection
$ref = new ReflectionClass("MenuItem");
echo "Class MenuItem punya property: ";
foreach ($ref->getProperties() as $p) { echo $p->getName() . " "; }
echo "<br>";

// (18) Dependency Injection
class Delivery {
    private $alamat;
    public function __construct($alamat) { $this->alamat = $alamat; }
    public function kirim() { echo "Kirim ke {$this->alamat}<br>"; }
}
$delivery = new Delivery("Jl. Mawar");
$delivery->kirim();

// (19) Cloning
$clone = clone $item1;
echo "Clone menu: {$clone->nama}<br>";

// (20) Anonymous Class
$anon = new class {
    public function pesan() { echo "Pesan lewat Anonymous Class<br>"; }
};
$anon->pesan();

} // end global namespace
?>