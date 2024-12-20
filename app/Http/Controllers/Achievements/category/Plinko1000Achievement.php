<?php

namespace App\Http\Controllers\Achievements\category;
use App\Http\Controllers\Achievements\Achievement;

class Plinko1000Achievement extends Achievement {

    public function id(): int {
        return 38;
    }

    public function name(): string {
        return 'Plinko';
    }

    public function description(): string {
        return 'Выиграйте в Plinko 1000 раз';
    }

    public function category(): string {
        return 'Plinko';
    }

    public function badge(): string {
        return 'gold';
    }

    public function progress(): int {
        return 1000;
    }

    public function reward() {
        return null;
    }

    public function whenAwarded() {
    }

}