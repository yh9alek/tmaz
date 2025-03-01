<?php

namespace b;

require_once __DIR__.'/../Classes/A.php';
use a\A;

require_once __DIR__.'/../traits/who.php';
use traits\Who;

class B extends A {

    public function test() {
        A::who();
        self::who();
        parent::who();
        static::who();
    }

    use Who;

}