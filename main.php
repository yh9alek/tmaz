<?php

use c\C;

class Program {
    public static function main() {
        (new C)->test();
    }
}

Program::main();

class Persona {

    public string $nombre;
    public int    $edad;

    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad   = $edad;
    }

}

# Desestructuración en PHP (Solo aplica a arrays, para objetos es necesario convertirlos a su equivalente en array asociativo)

$frutas = [
    '🍎' => 'manzana',
    '🥥' => 'coco',
    '🍇' => 'uva'
];

[ '🍎' => $manzana, '🥥' => $coco, '🍇' => $uva ] = $frutas;

echo $manzana, $coco, $uva;

# Antes en versiones anteriores del lenguaje, se usaba list() para desestructurar, (Ojo solo aplica a arrays indexados, no asociativos)

list($manzana, $coco, $uva) = $frutas; # ❎ Error

# Correcto

$array = ['🍍', '🥝', '🍎', '🍇'];
list($pina, $kiwi, $manzana, $uva) = $array;

$animal = array_find(
    ['dog', 'cat', 'cow', 'duck', 'goose'],
    static fn (string $value): bool => str_starts_with($value, 'c'),
);

var_dump($animal); // string(3) "cat"

trait A {
    public function upper() { print 'A'; }
    public function lower() { print 'a'; }
}

trait B {
    public function upper() { print 'B'; }
    public function lower() { print 'b'; }
}

interface I1 {
    public function a();
}

interface I2 {
    public function b();
}

interface I3 extends I1, I2 {
    const MICONST = 'I3::TRUE';
}

class Other implements I3 {

    use A, B {
        A::upper insteadof B;
        B::lower insteadof A;
        A::lower as private lower_A;
    }

    public static function create(): static {
        return new static();
    }

    public function a() { print 'a'; }
    public function b() { print 'b'; }
}

class Foo extends Other {
    public function getLowerA() {
        return [$this, 'lower_A'];
    }
}

$j = Other::create(); // Instancia de Other
$k = Foo::create();   // Instancia de Foo

print Other::MICONST;

call_user_func(
    $k->getLowerA() # Invocamos el método de manera dinámica
);

# --------------- Last Static Binding ------------------

trait Who {
    public static function who() {
        echo __CLASS__."\n";
    }
}

class J {
    public static function foo() {
        static::who();
    }

    use Who;
}

class K extends J {}

class L extends K {
    public function test() {
        J::foo();             // J
        $this::foo();         // L
        self::foo();          // L
        parent::foo();        // L
        static::foo();        // L
    }

    use Who;
}

class M extends L {
    public static function foo() {
        static::who();
    }
}

(new M)->test();