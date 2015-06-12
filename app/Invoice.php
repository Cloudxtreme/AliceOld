<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	protected $table = 'invoice';
  protected $primaryKey = 'id';
	protected $fillable = ['uid', 'type', 'amount', 'remark'];

}
