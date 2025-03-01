<?php

require_once __DIR__.'/../classes/B.php';

namespace c;

class C extends \b\B {
    public static function foo() {
        static::who();
    }
}