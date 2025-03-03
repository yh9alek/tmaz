<?php

trait foo {
    public static function foo() {
        static::who();
    }
}

trait who {
    public static function who() {
        echo __CLASS__.'\n';
    }
}

class A {
    use foo, who;    
}

class B extends A {

    public function test() {
        A::foo();       // A
        self::foo();    // A
        parent::foo();  // A
        static::foo();  // A
    }

}

class C extends B {

    use foo;

}

(new C)->test();

define("LECTURA",   0b001);
define("ESCRITURA", 0b010);
define("EJECUCION", 0b100);

$user = LECTURA | ESCRITURA;

