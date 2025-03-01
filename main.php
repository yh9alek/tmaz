<?php

use c\C;

class Test {
    public function main() {
        (new C)->test();
    }
}

(new class {
    public static function run() {
        (new Test)->main();
    }
})->run();