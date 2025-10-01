<?php
// BUFFERING supaya echo awal aman
ob_start();

echo "<h2>FoodHub - 20 Materi OOP PHP</h2><hr>";

// 1️⃣ Scope
class MenuItem { ... } // tetap sama
$item1 = new MenuItem("Burger",30000,5);
echo "<b>Scope:</b> ...<br>";

// 2️⃣ Encapsulation
class Customer { ... }
$customer = new Customer("Aurell",100000);
echo "<b>Encapsulation:</b> ...<br>";

// 3️⃣ Magic Methods
class Keranjang { ... }
$cart = new Keranjang();
$cart->menu = "Burger";
echo "<b>Magic Methods:</b> $cart->menu <br>";
$cart->checkout(60000,"Cash");

// 4️⃣ Inheritance
class Pegawai { ... }
class Driver extends Pegawai { ... }
$driver = new Driver("Andi"); $driver->getInfo();

// 5️⃣ Class Constants
class FoodHub { const APP="FoodHub!"; }
echo "<b>Class Constants:</b> Selamat datang di ".FoodHub::APP."<br>";

// 6️⃣ Late Static Binding
class Base { ... }
class Turunan extends Base { ... }
echo "<b>Late Static Binding:</b> "; Base::siapa(); echo " vs "; Turunan::siapa(); echo "<br>";

// 7️⃣ Final Keyword
final class Dapur { ... }
$dapur = new Dapur(); $dapur->masak("Burger");

// 8️⃣ Type Hinting & Return Types
function hitungTotal(int $harga,int $qty):int{ return $harga*$qty; }
echo "<b>Type Hinting:</b> Total bayar: ".hitungTotal(30000,2)."<br>";

// 9️⃣ Exception Handling
try { ... } catch(Exception $e){...} finally{...}

// 10️⃣ Trait
trait Promo { ... }
class Transaksi { use Promo; }
$trans = new Transaksi();
echo "<b>Trait:</b> Harga promo: ".$trans->hitungDiskon(60000)."<br>";

// 11️⃣ Polymorphism
interface Pembayaran{...}
class BayarCash implements Pembayaran{...}
class BayarEwallet implements Pembayaran{...}
(new BayarCash())->proses(60000);
(new BayarEwallet())->proses(60000);

// 12️⃣ Static Properties & Methods
class Counter{...} Counter::tambah(); Counter::tambah();
echo "<b>Static:</b> Jumlah transaksi: ".Counter::$jumlah."<br>";

// 13️⃣ Namespace
namespace FoodHubApp {
    class Menu { public function show(){echo "<b>Namespace:</b> Menu dari namespace FoodHub<br>";} }
}
namespace {
    $menu = new \FoodHubApp\Menu(); $menu->show();
}

// 14️⃣ CRUD & MVC
class ModelMenu { ... } $model = new ModelMenu(); $model->create("Es Teh");
echo "<b>CRUD & MVC:</b> ".implode(",",$model->read())."<br>";

// 15️⃣ Object Serialization
$seri=serialize($item1); $obj=unserialize($seri);
echo "<b>Serialization:</b> Unserialized: ".$obj->nama."<br>";

// 16️⃣ Object Iteration
class DaftarMenu implements IteratorAggregate{ ... }
foreach(new DaftarMenu() as $m){echo "Menu: $m<br>";}

// 17️⃣ Reflection
$ref = new ReflectionClass("MenuItem"); foreach($ref->getProperties() as $p){echo $p->getName()." ";} echo "<br>";

// 18️⃣ Dependency Injection
class Delivery{ ... } $delivery = new Delivery("Jl. Mawar"); $delivery->kirim();

// 19️⃣ Cloning Object
$clone = clone $item1; echo "<b>Cloning Object:</b> Clone menu: {$clone->nama}<br>";

// 20️⃣ Anonymous Class
$anon = new class { public function pesan(){echo "<b>Anonymous Class:</b> Pesan lewat Anonymous Class<br>";} };
$anon->pesan();

ob_end_flush();
?>