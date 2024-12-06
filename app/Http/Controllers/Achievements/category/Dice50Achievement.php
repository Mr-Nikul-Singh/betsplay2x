<?php

namespace App\Http\Controllers\Achievements\category;
use App\Http\Controllers\Achievements\Achievement;


class Dice50Achievement extends Achievement {

    public function id(): int {
        return 33;
    }

    public function name(): string {
        return 'Dice';
    }

    public function description(): string {
        return 'Выиграйте в Dice 50 раз';
    }

    public function category(): string {
        return 'dice';
    }

    public function badge(): string {
        return 'bronze';
    }

    public function progress(): int {
        return 50;
    }

    public function reward() {
        return null;
    }

    public function whenAwarded() {
    }

}