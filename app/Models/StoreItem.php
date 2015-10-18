<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreItem extends Model
{
    protected $connection = 'store';
    protected $table = 'items';
    protected $fillable = ['priority','name','display_name','description','web_description','type','loadout_slot','price','category_id','attrs','is_buyable','is_tradeable','is_refundable','expiry_time','flags','enable_server_restriction'];

    public function users()
    {
        return $this->belongsToMany('App\Models\StoreUser','users_items', 'item_id', 'user_id')->withTimestamps();
    }

    public function servers()
    {
        return $this->belongsToMany('App\Models\StoreServer','servers_items', 'item_id', 'server_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\StoreCategory','category_id','id');
    }

    public function getServerListAttribute()
    {
        return $this->servers->lists('id');
    }
}
