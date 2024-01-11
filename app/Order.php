<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'address', 'size', 'toppings', 'instructions', 'status_id', 'deliveryman_id', 'estimation'];

    /**
     * Get the customer that placed the order.
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the status of the order.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

     /**
     * Get the deliveryman of the order.
     */
    public function deliveryman()
    {
        return $this->belongsTo('App\Deliveryman');
    }
}
