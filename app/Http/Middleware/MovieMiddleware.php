<?php

namespace App\Http\Middleware;

use Closure;
use Google_Client;
use Google_Service_YouTube;

class MovieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //YoutubeAPIの設定



        $client = new Google_Client();
        $client->setDeveloperKey(env('GOOGLE_API_KEY'));
        $youtube = new Google_Service_YouTube($client);

        //検索したキーワードから動画を取得
        if (!empty($request->keyword)) {
            $params = [
                'maxResults' => 10,
                'type' => 'video',
                'order' => 'viewCount',
                'q' => $request->keyword
            ];
            //カテゴリー検索
        } elseif (!empty($request->categories)) {
            $params = [
                'regionCode' => 'jp',
                'maxResults' => 10,
                'chart' => 'mostPopular',
                'videoCategoryId' => $request->categories
            ];
        }
        $request->merge(['params' => $params, 'youtube' => $youtube]);
        return $next($request);
    }
}
