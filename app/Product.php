<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Session;

class Product extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }


    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }

    public function presentPrice()
    {   
           if(Session('customer'))

                return '&'.number_format($this->wholesaleprice / 100, 2);
            else
                return '&'.number_format($this->price / 100, 2);

    }



    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    public function wishlist(){
       return $this->hasMany(Wishlist::class);
    }

}
    