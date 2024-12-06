<?php

namespace App\Http\Controllers\Achievements;

use App\Http\Controllers\Achievements\Category\{
    Game1Achievement,
    Game1000Achievement,
    Game5000Achievement,
    Level3Achievement,
    Level5Achievement,
    Level8Achievement,
    Level10Achievement,
    Freebie15Achievement,
    Freebie50Achievement,
    Freebie100Achievement,
    Referral10Achievement,
    Referral100Achievement,
    Referral500Achievement,
    Mines50Achievement,
    Mines500Achievement,
    Mines5000Achievement,
    Tower100Achievement,
    Tower50Achievement,
    Tower200Achievement,
    Stairs100Achievement,
    Stairs50Achievement,
    Stairs200Achievement,
    Dice50Achievement,
    Dice200Achievement,
    Dice1000Achievement,
    Coinflip25Achievement,
    Coinflip150Achievement,
    Coinflip500Achievement,
    Wheel50Achievement,
    Wheel300Achievement,
    Wheel1000Achievement,
    HiLo25Achievement,
    HiLo150Achievement,
    HiLo500Achievement,
    Crash50Achievement,
    Crash150Achievement,
    Crash500Achievement,
    Roulette50Achievement,
    Roulette150Achievement,
    Roulette25Achievement,
    Blackjack50Achievement,
    Blackjack200Achievement,
    Blackjack21_50Achievement,
    Plinko25Achievement,
    Plinko250Achievement,
    Plinko1000Achievement,
    Keno25Achievement,
    Keno250Achievement,
    Keno1000Achievement
};

class Achievements {

    public static $achievements = [
        // user
        Game1Achievement::class,
        Game1000Achievement::class,
        Game5000Achievement::class,
        Level3Achievement::class,
        Level5Achievement::class,
        Level8Achievement::class,
        Level10Achievement::class,
        Freebie15Achievement::class,
        Freebie50Achievement::class,
        Freebie100Achievement::class,
        Referral10Achievement::class,
        Referral100Achievement::class,
        Referral500Achievement::class,

        // mines
        Mines50Achievement::class,
        Mines500Achievement::class,
        Mines5000Achievement::class,

        // tower
        Tower100Achievement::class,
        Tower50Achievement::class,
        Tower200Achievement::class,

        // stairs
        Stairs100Achievement::class,
        Stairs50Achievement::class,
        Stairs200Achievement::class,

        // dice
        Dice50Achievement::class,
        Dice200Achievement::class,
        Dice1000Achievement::class,

        // coinflip
        Coinflip25Achievement::class,
        Coinflip150Achievement::class,
        Coinflip500Achievement::class,

        // wheel
        Wheel50Achievement::class,
        Wheel300Achievement::class,
        Wheel1000Achievement::class,

        // hilo
        HiLo25Achievement::class,
        HiLo150Achievement::class,
        HiLo500Achievement::class,

        // crash
        Crash50Achievement::class,
        Crash150Achievement::class,
        Crash500Achievement::class,

        // roulette
        Roulette50Achievement::class,
        Roulette150Achievement::class,
        Roulette25Achievement::class,

        // blackjack
        Blackjack50Achievement::class,
        Blackjack200Achievement::class,
        Blackjack21_50Achievement::class,

        // plinko
        Plinko25Achievement::class,
        Plinko250Achievement::class,
        Plinko1000Achievement::class,

        // keno
        Keno25Achievement::class,
        Keno250Achievement::class,
        Keno1000Achievement::class
    ];

    public static function categories() : array {
        $result = [];
        foreach (self::instances() as $instance) {
            $category = $instance->category();
            if (!in_array($category, $result)) {
                $result[] = $category;
            }
        }
        return $result;
    }

    public static function get($category) : array {
        $result = [];
        foreach (self::instances() as $instance) {
            if ($instance->category() === $category) {
                $result[] = $instance;
            }
        }
        return $result;
    }

    private static function instances() : array {
        $instances = [];
        foreach (self::$achievements as $achievementClass) {
            if (class_exists($achievementClass)) {
                $instances[] = new $achievementClass();
            }
        }
        return $instances;
    }
}
