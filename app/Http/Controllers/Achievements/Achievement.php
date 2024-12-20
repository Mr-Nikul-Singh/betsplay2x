<?php 
namespace App\Http\Controllers\Achievements;
use App\User;

use Auth;

abstract class Achievement {

    abstract public function id() : int;

    /**
     * @return string achievement name
     */
    abstract public function name() : string;

    /**
     * @return string achievement description
     */
    abstract public function description() : string;

    /**
     * @return string achievement category
     */
    abstract public function category() : string;

    /**
     * @return string achievement badge (bronze/silver/gold/platinum)
     */
    abstract public function badge() : string;

    /**
     * @return int amount of points required to get this achievement
     */
    abstract public function progress() : int;

    /**
     * @return mixed reward text or null if it doesn't reward anything
     */
    abstract public function reward();

    /**
     * Triggered when achievement is awarded
     */
    abstract public function whenAwarded();

    /**
     * @return bool|string return false if it's not unlocked, otherwise return string with unlock date
     */
    public static function unlockStatus(Achievement $achievement, $id = null) {
        if($id == null) $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        if($user == null) return false;
        $arr = json_decode($user->achievements, true);
        foreach ($arr as $key => $v)
            if($v['id'] == $achievement->id() && isset($v['time'])) return date("d.m.Y", $v['time']);
        return false;
    }

    public static function getProgress(Achievement $achievement, $id = null) {
        if($id == null) $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        if($user == null) return false;
        $arr = json_decode($user->achievements, true);
        foreach ($arr as $key => $v)
            if($v['id'] == $achievement->id() && isset($v['p'])) return $v['p'];
        return 0;
    }

    public static function awardProgress(Achievement $achievement, $points, $id = null) {
        if($id == null) $id = Auth::user()->id;
        if(self::unlockStatus($achievement, $id) == true) return;

        $user = User::where('id', $id)->first();
        if($user == null) return false;
        $arr = json_decode($user->achievements, true);

        $progress = 0;
        foreach ($arr as $key => $v) {
            if($v['id'] == $achievement->id()) {
                $progress = $v['p'];
                unset($arr[$key]);
                break;
            }
        }

        $award = $progress + $points >= $achievement->progress();

        if($award) array_push($arr, [
            'id' => $achievement->id(),
            'time' => time()
        ]);
        else array_push($arr, [
            'id' => $achievement->id(),
            'p' => $progress + $points
        ]);

        $user->achievements = json_encode($arr);
        $user->save();

        if(!$award) return;

        $achievement->whenAwarded();

        $amount = $achievement->badge() === 'bronze' ? 1.5 : ($achievement->badge() === 'silver' ? 5 : ($achievement->badge() === 'gold' ? 10 : 25));
        if($user->level < 10) User::expPercent($amount, $user->id);
        else {
            $user->money = $user->money + 0.50;
            $user->save();
        }

        Notification::send($user->id, 'fad fa-award', 'Достижение разблокировано: '.$achievement->name(), $achievement->description());

    }

 public static function awardProgressFake(Achievement $achievement, $points, $id) {
        if($id == null) $id = Auth::user()->id;
        if(self::unlockStatusFake($achievement, $id) == true) return;

        $user = User::where('id', $id)->first();
        if($user == null) return false;
        $arr = json_decode($user->achievements, true);

        $progress = 0;
        foreach ($arr as $key => $v) {
            if($v['id'] == $achievement->id()) {
                $progress = $v['p'];
                unset($arr[$key]);
                break;
            }
}

        $award = $progress + $points >= $achievement->progress();

        if($award) array_push($arr, [
            'id' => $achievement->id(),
            'time' => time()
        ]);
        else array_push($arr, [
            'id' => $achievement->id(),
            'p' => $progress + $points
        ]);

        $user->achievements = json_encode($arr);
        $user->save();

        if(!$award) return;

        $achievement->whenAwarded();

        $amount = $achievement->badge() === 'bronze' ? 1.5 : ($achievement->badge() === 'silver' ? 5 : ($achievement->badge() === 'gold' ? 10 : 25));
        if($user->level < 10) User::expPercent($amount, $user->id);
        else {
            $user->money = $user->money + 0.50;
            $user->save();
        }

        Notification::send($user->id, 'fad fa-award', 'Достижение разблокировано: '.$achievement->name(), $achievement->description());

    } 

    public static function award(Achievement $achievement, $id = null) {
        self::awardProgress($achievement, $achievement->progress(), $id);
    }
	
public static function awardFake(Achievement $achievement, $id) {
        self::awardProgress($achievement, $achievement->progress(), $id);
    } 	


 public static function unlockStatusFake(Achievement $achievement, $id) {
        if($id == null) $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        if($user == null) return false;
        $arr = json_decode($user->achievements, true);
        foreach ($arr as $key => $v)
            if($v['id'] == $achievement->id() && isset($v['time'])) return date("d.m.Y", $v['time']);
        return false;
    } 

}

