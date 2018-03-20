<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HttpClient;
use Cache;

class BlogController extends Controller
{

	protected $http_client;

    protected $recent_posts = [];

	public function __construct(HttpClient $http_client)
	{
		$this->http_client = $http_client;
	}

    public function getList()
    {
  		try{
  			$api_response = $this->http_client->get('rest/blog-posts');
  			$api_response_body = json_decode($api_response->getBody(), true);
  			$posts = collect($api_response_body)->map(function($post){
  				$post['link'] = route('frontsite.guests.blog.show', [
					'slug' => $post['slug']
				]);
  				return $post;
  			});
            $recent_posts = $this->_getRecentPosts($posts);
  		}catch(\Exception $e){
  			dd($e->getMessage());
  		}

    	return view(
    		'frontsite.pages.guests.blog.list',
    		compact('posts', 'recent_posts')
    	);
    }

    public function getShow($slug)
    {
    	try{
  			$api_response = $this->http_client->get('rest/blog-posts/' . $slug, [
  				'query' => [
  					'include_next_post' => true,
                    'include_previous_post' => true
  				]
  			]);
  			$post = json_decode($api_response->getBody(), true);
  			if(isset($post['next_post'])){
  				$post['next_post']['link'] = route('frontsite.guests.blog.show', [
					'slug' => $post['next_post']['slug']
				]);
  			}
            if(isset($post['previous_post'])){
                $post['previous_post']['link'] = route('frontsite.guests.blog.show', [
                    'slug' => $post['previous_post']['slug']
                ]);
            }
            $recent_posts = $this->_getRecentPosts([]);
  		}catch(\Exception $e){
  			$error_message = $e->getResponse()->getBody()->getContents();
  			return back()->with('messages', [
  				'error' => $error_message
  			]);
  		}

    	return view(
    		'frontsite.pages.guests.blog.show',
    		compact('post', 'recent_posts')
    	);
    }

    protected function _getRecentPosts($posts = [])
    {
        return Cache::remember('recent_posts', 60, function() use($posts)
        {
            return array_slice($posts->toArray(), 0, 5);
        });
    }
}
