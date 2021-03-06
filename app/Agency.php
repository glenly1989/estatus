<?php

namespace App;

use Auth;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model implements Searchable
{
	protected $table = 'agencies';
 
    protected $guarded = [];
 
    public function getSearchResult(): SearchResult
    {
    	$role = strtolower(implode(', ', Auth::user()->roles()->pluck('name')->toArray()));
        $url = route($role.'.agencies.show', $this->id);
 
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function vehicles(){
    	return $this->belongsToMany('App\Vehicle');
    }

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
