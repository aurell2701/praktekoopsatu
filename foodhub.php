<?php
// ==================== 13️⃣ Namespace harus di atas ====================
namespace FoodHubApp {
    class Menu {
        public function show() {
            echo "<b>Namespace:</b> Menu dari namespace FoodHub<br>";
        }
    }
}
namespace {

// ==================== Fungsi Aplikasi ====================
function runCafe() {
    echo "<h2>Mini Cafe Interaktif - 20 Materi OOP PHP</h2><hr>";

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
        public function kurangiStok($jumlah){ $this->stok -= $jumlah; }
    }

    $menuItems = [
        new MenuItem("Burger",30000,5),
        new MenuItem("Nasi Goreng",25000,3),
        new MenuItem("Es Teh",10000,10)
    ];

    // 2️⃣ Encapsulation
    class Customer {
        private $nama;
        private $saldo;
        public function __construct($nama, $saldo){ $this->nama=$nama; $this->saldo=$saldo; }
        public function getNama(){ return $this->nama; }
        public function getSaldo(){ return $this->saldo; }
        public function bayar($jumlah){ 
            if($jumlah > $this->saldo) throw new \Exception("Saldo tidak cukup!");
            $this->saldo -= $jumlah;
        }
    }
    $customer = new Customer("Aurell",100000);

    // 3️⃣ Magic Methods
    class Keranjang {
        private $items = [];
        public function __construct(){ echo "<b>Magic Methods:</b> Keranjang dibuat<br>"; }
        public function __destruct(){ echo "Keranjang selesai<br>"; }
        public function __get($name){ return $this->items[$name] ?? null; }
        public function __set($name,$value){ $this->items[$name]=$value; }
        public function __toString(){ return implode(", ", $this->items); }
        public function __call($name,$args){ echo "Panggil $name dengan ".implode(", ",$args)."<br>"; }
        public function addItem($item,$qty){
            if(!isset($this->items[$item->nama])) $this->items[$item->nama]=0;
            $this->items[$item->nama] += $qty;
            $item->kurangiStok($qty);
        }
        public function total($menuItems){
            $total = 0;
            foreach($this->items as $nama=>$qty){
                foreach($menuItems as $m){
                    if($m->nama == $nama) $total += $m->getHarga()*$qty;
                }
            }
            return $total;
        }
    }
    $cart = new Keranjang();

    // Menampilkan menu dan input user
    echo "<b>Menu:</b><br>";
    foreach($menuItems as $index=>$m){
        echo ($index+1).". {$m->nama} - Rp {$m->getHarga()} (Stok: {$m->getStok()})<br>";
    }

    // Input user (CLI)
    echo "<b>Input Pilihan Menu:</b> ";
    $handle = fopen("php://stdin","r");
    $pilihan = trim(fgets($handle));
    $qty = 1;
    echo "Jumlah: ";
    $qty = (int)trim(fgets($handle));

    if(isset($menuItems[$pilihan-1])){
        $cart->addItem($menuItems[$pilihan-1],$qty);
    } else { echo "Pilihan tidak valid!<br>"; }

    // 8️⃣ Type Hinting & 10️⃣ Trait
    trait Promo { public function hitungDiskon($harga){ return $harga*0.9; } }
    class Transaksi { use Promo; }

    $trans = new Transaksi();
    $totalBayar = $trans->hitungDiskon($cart->total($menuItems));

    echo "Total bayar setelah promo: Rp $totalBayar<br>";

    // 11️⃣ Polymorphism
    interface Pembayaran { public function proses($jumlah); }
    class BayarCash implements Pembayaran { public function proses($jumlah){ echo "Bayar Cash: $jumlah<br>"; } }
    class BayarEwallet implements Pembayaran { public function proses($jumlah){ echo "Bayar Ewallet: $jumlah<br>"; } }

    echo "Pilih metode bayar (1=Cash, 2=Ewallet): ";
    $metode = trim(fgets($handle));
    $pembayaran = $metode==1? new BayarCash() : new BayarEwallet();
    $pembayaran->proses($totalBayar);

    try { $customer->bayar($totalBayar); } 
    catch(\Exception $e){ echo $e->getMessage()."<br>"; }

    echo "Sisa saldo: ".$customer->getSaldo()."<br>";

    // 12️⃣ Static Properties & Methods
    class Counter{ public static $jumlah=0; public static function tambah(){self::$jumlah++;} }
    Counter::tambah();
    echo "Jumlah transaksi: ".Counter::$jumlah."<br>";

    // 14️⃣ CRUD & MVC
    class ModelMenu {
        private $data=[]; 
        public function create($menu){$this->data[]=$menu;}
        public function read(){return $this->data;}
    }
    $model = new ModelMenu();
    $model->create($cart->__toString());
    echo "Keranjang tersimpan (CRUD): ".implode(",",$model->read())."<br>";

    // 15️⃣ Serialization
    $seri = serialize($cart);
    $cloneCart = unserialize($seri);
    echo "Serialized & Unserialized keranjang: ".$cloneCart."<br>";

    // 16️⃣ Iteration
    class DaftarMenu implements \IteratorAggregate{
        private $menu=["Burger","Nasi Goreng","Es Teh"];
        public function getIterator(): \Traversable{ return new \ArrayIterator($this->menu); }
    }
    foreach(new DaftarMenu() as $m){ echo "Iteration menu: $m<br>"; }

    // 17️⃣ Reflection
    $ref = new \ReflectionClass("MenuItem");
    echo "Reflection: MenuItem properties: ";
    foreach($ref->getProperties() as $p){ echo $p->getName()." "; }
    echo "<br>";

    // 18️⃣ Dependency Injection
    class Delivery{
        private $alamat;
        public function __construct($alamat){ $this->alamat=$alamat; }
        public function kirim(){ echo "Kirim ke {$this->alamat}<br>"; }
    }
    $delivery = new Delivery("Jl. Mawar"); $delivery->kirim();

    // 19️⃣ Cloning
    $cloneItem = clone $menuItems[0];
    echo "Cloning object: ".$cloneItem->nama."<br>";

    // 20️⃣ Anonymous Class
    $anon = new class { public function pesan(){ echo "Pesan lewat Anonymous Class<br>"; } };
    $anon->pesan();
}

// Jalankan aplikasi
runCafe();

}
?>