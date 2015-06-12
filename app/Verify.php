<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model {

	protected $table = 'verify';
  protected $primaryKey = 'uid';
	protected $fillable = ['uid', 'email', 'phone'];
  
  static public function status($uid){
    $status = self::firstOrCreate([
      'uid' => $uid,
      'email' => '0',
      'phone' => '0'
    ]);
    return $status;
  }
  
  static public function generate($uid, $type){
    $status = self::status($uid);
    switch($type){
      case 'email':
        $status->email = self::randCode(8, 0);
        break;
      case 'phone':
        $status->phone = self::randCode(6, 1);
        break;
    }
    $status->save();
  }
  
  static public function get($uid, $type){
    $status = self::status($uid);
    switch($type){
      case 'email':
        return $status->email;
        break;
      case 'phone':
        return $status->phone;
        break;
    }
  }
  
  static public function pass($uid, $type){
    $status = self::status($uid);
    switch($type){
      case 'email':
        $status->email = 'ok';
        break;
      case 'phone':
        $status->phone = 'ok';
        break;
    }
    $status->save();
  }
  
  /**
    +----------------------------------------------------------
   * randCode
    +----------------------------------------------------------
   * @param int       $length  Length of random string
   * @param string    $type    Random string type：[0:Number+Letter(U&L);1:Number;2:Letter(L);3:Letter(U);4:Special character;-1:All]
    +----------------------------------------------------------
   * @return string
    +----------------------------------------------------------
   */
  static public function randCode($length = 5, $type = 0) {
    $arr = [
      '1' => '0123456789',
      '2' => 'abcdefghijklmnopqrstuvwxyz',
      '3' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
      '4' => '~@#$%^&*(){}[]|'
    ];
    if ($type == 0) {
      array_pop($arr);
      $string = implode("", $arr);
    } elseif ($type == "-1") {
      $string = implode("", $arr);
    } else {
      $string = $arr[$type];
    }
    $count = strlen($string) - 1;
    $code = '';
    for ($i = 0; $i < $length; $i++) {
      $code .= $string[rand(0, $count)];
    }
    return $code;
  }

}
