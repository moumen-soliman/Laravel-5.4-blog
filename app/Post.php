<?php

namespace App;
use Carbon\Carbon;

/* use Illuminate\Database\Eloquent\Model; */ //based on Model.php

class Post extends Model
{

	public function comments()
	{
		return $this->hasMany(Comment::class); // tha same of return $this->hasMany(App\Comment);
	}

	public function user()
	{
		return $this->belongsTo(User::class); //check posts/post.blade.php
	}

	public function addComment($boddy)
	{
		/* Comment::create([

		 'body' => $body,
		 'post_id' => $this->id

		]);
				convert to next line
		*/

		$this->comments()->create(compact('body'));
	}

	public function scopeFilter($query , $filters)
	{
		$posts = Post::latest(); // start from last record

        if($month = $filters['month']){

            $query->whereMonth('created_at', Carbon::parse($month)->month);

        } 

        if($year = $filters['year']){

            $query->whereYear('created_at', $year);

        } 

        $posts = $posts->get();
	}


	public static function archives()
	{

        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

        ->groupBy('year','month')

        ->orderByRaw('min(created_at) desc')

        ->get()

        ->toArray();


	}

}
