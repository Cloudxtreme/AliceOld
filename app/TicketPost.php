<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketPost extends Model {

	protected $table = 'ticket_post';
  protected $primaryKey = 'id';
	protected $fillable = ['tid', 'content', 'uid'];

}
