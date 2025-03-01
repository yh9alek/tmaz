<?php

trait Fix {
    public static function mostrar() {
        echo 'Mostrando...';
    }
}
class Hot { use Fix; }