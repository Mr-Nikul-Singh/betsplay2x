<?php

namespace App\Http\Controllers\Achievements\category;
use App\Http\Controllers\Achievements\Achievement;

class Plinko250Achievement extends Achievement {

    public function id(): int {
        return 37;
    }

    public function name(): string {
        return 'Plinko';
    }

    public function description(): string {
        return 'Выиграйте в Plinko 250 раз';
    }

    public function category(): string {
        return 'Plinko';
    }

    public function badge(): string {
        return 'silver';
    }

    public function progress(): int {
        return 250;
    }

    public function reward() {
        return null;
    }

    public function whenAwarded() {
    }

}