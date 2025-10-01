<?php
// ==================== 13️⃣ Namespace harus di atas ====================
namespace FoodHubApp {
    class Menu {
        public function show() {
            echo "<b>Namespace:</b> Menu dari namespace FoodHub<br>";
        }
    }
}

// ==================== Global Namespace ====================
namespace {

// BUFFERING supaya echo awal aman
ob_start();

echo "<h2>Mini Cafe - 20 Materi OOP PHP</h2><hr>";

// 1️⃣ Scope
class MenuItem {
    public $nama;
    protected $stok;
    private $harga;

    public function __construct($nama, $harga, $stok){
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getHarga(){ return $this->harga; }
    public function getStok(){ return $this->stok; }
}
$item1 = new MenuItem("Burger", 30000, 5);
echo "<b>Scope:</b> {$item1->nama}, Harga: {$item1->getHarga()}, Stok: {$item1->getStok()}<br>";

// 2️⃣ Encapsulation
class Customer {
    private $nama;
    private $saldo;

    public function __construct($nama, $saldo){
        $this->nama = $nama;
        $this->saldo = $saldo;
    }

    public function getNama(){ return $this->nama; }
    public function getSaldo(){ return $this->saldo; }
}
$customer = new Customer("Aurell",100000);
echo "<b>Encapsulation:</b> Customer: {$customer->getNama()}, Saldo: {$customer->getSaldo()}<br>";

// 3️⃣ Magic Methods
class Keranjang {
    private $items = [];
    public function __construct(){ echo "<b>Magic Methods:</b> Keranjang dibuat<br>"; }
    public function __destruct(){ echo "Keranjang selesai<br>"; }
    public function __get($name){ return $this->items[$name] ?? null; }
    public function __set($name, $value){ $this->items[$name] = $value; }
    public function __toString(){ return implode(", ", $this->items); }
    public function __call($name, $args){ echo "Panggil $name dengan ".implode(", ",$args)."<br>"; }
}
$cart = new Keranjang();
$cart->menu = "Burger";
echo $cart->menu . "<br>";
$cart->checkout(60000,"Cash"); // __call akan dipanggil

// 4️⃣ Inheritance
class Pegawai { public $nama; public function __construct($nama){$this->nama=$nama;} }
class Driver extends Pegawai { public function getInfo(){ echo "<b>Inheritance:</b> Driver: {$this->nama}<br>"; } }
$driver = new Driver("Andi"); $driver->getInfo();

// 5️⃣ Class Constants
class FoodHub { const APP="Mini Cafe FoodHub!"; }
echo "<b>Class Constants:</b> Selamat datang di ".FoodHub::APP."<br>";

// 6️⃣ Late Static Binding
class Base { public static function siapa(){ echo "Base"; } }
class Turunan extends Base { public static function siapa(){ echo "Turunan"; } }
echo "<b>Late Static Binding:</b> "; Base::siapa(); echo " vs "; Turunan::siapa(); echo "<br>";

// 7️⃣ Final Keyword
final class Dapur { public function masak($menu){ echo "<b>Final:</b> Dapur memasak $menu<br>"; } }
$dapur = new Dapur(); $dapur->masak("Burger");

// 8️⃣ Type Hinting & Return Types
function hitungTotal(int $harga,int $qty):int { return $harga*$qty; }
echo "<b>Type Hinting:</b> Total bayar: ".hitungTotal(30000,2)."<br>";

// 9️⃣ Exception Handling
try {
    $stok = 0;
    if($stok<=0) throw new \Exception("Stok habis!");
} catch(\Exception $e){ echo "<b>Exception Handling:</b> ".$e->getMessage()."<br>"; }
finally{ echo "Cek stok selesai<br>"; }

// 10️⃣ Trait
trait Promo { public function hitungDiskon($harga){ return $harga*0.9; } }
class Transaksi { use Promo; }
$trans = new Transaksi();
echo "<b>Trait:</b> Harga promo: ".$trans->hitungDiskon(60000)."<br>";

// 11️⃣ Polymorphism
interface Pembayaran { public function proses($jumlah); }
class BayarCash implements Pembayaran { public function proses($jumlah){ echo "<b>Polymorphism:</b> Bayar Cash: $jumlah<br>"; } }
class BayarEwallet implements Pembayaran { public function proses($jumlah){ echo "Bayar Ewallet: $jumlah<br>"; } }
(new BayarCash())->proses(60000);
(new BayarEwallet())->proses(60000);

// 12️⃣ Static Properties & Methods
class Counter { public static $jumlah=0; public static function tambah(){ self::$jumlah++; } }
Counter::tambah(); Counter::tambah();
echo "<b>Static:</b> Jumlah transaksi: ".Counter::$jumlah."<br>";

// 13️⃣ Namespace sudah dideklarasikan di atas
$menu = new \FoodHubApp\Menu(); $menu->show();

// 14️⃣ CRUD & MVC
class ModelMenu {
    private $data=[];
    public function create($menu){ $this->data[]=$menu; }
    public function read(){ return $this->data; }
}
$model = new ModelMenu();
$model->create("Es Teh");
echo "<b>CRUD & MVC:</b> ".implode(",",$model->read())."<br>";

// 15️⃣ Object Serialization
$seri = serialize($item1);
$obj = unserialize($seri);
echo "<b>Serialization:</b> Unserialized: ".$obj->nama."<br>";

// 16️⃣ Object Iteration
class DaftarMenu implements \IteratorAggregate {
    private $menu=["Nasi","Ayam","Es Teh"];
    public function getIterator(): \Traversable{ return new \ArrayIterator($this->menu); }
}
foreach(new DaftarMenu() as $m){ echo "Menu: $m<br>"; }

// 17️⃣ Reflection
$ref = new \ReflectionClass("MenuItem"); 
echo "<b>Reflection:</b> Class MenuItem punya property: ";
foreach($ref->getProperties() as $p){ echo $p->getName()." "; }
echo "<br>";

// 18️⃣ Dependency Injection
class Delivery {
    private $alamat;
    public function __construct($alamat){ $this->alamat=$alamat; }
    public function kirim(){ echo "<b>Dependency Injection:</b> Kirim ke {$this->alamat}<br>"; }
}
$delivery = new Delivery("Jl. Mawar"); $delivery->kirim();

// 19️⃣ Cloning Object
$clone = clone $item1; echo "<b>Cloning Object:</b> Clone menu: {$clone->nama}<br>";

// 20️⃣ Anonymous Class
$anon = new class { public function pesan(){ echo "<b>Anonymous Class:</b> Pesan lewat Anonymous Class<br>"; } };
$anon->pesan();

ob_end_flush();

}
?>