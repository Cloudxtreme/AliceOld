<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model {

	protected $table = 'tickets';
  protected $primaryKey = 'id';
	protected $fillable = ['uid', 'title', 'last_post', 'status'];

}
