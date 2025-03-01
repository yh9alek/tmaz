<?php

namespace traits;

trait Who {
    public static function who() {
        echo __CLASS__.'\n';
    }
}