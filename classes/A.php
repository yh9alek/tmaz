<?php

namespace a;

class A {
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo __CLASS__.'\n';
    }
}