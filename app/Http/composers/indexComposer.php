<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Google_Client;
use Google_Service_YouTube;

class indexComposer
{

  public function compose(View $view)
  {
    $client = new Google_Client();
    $client->setDeveloperKey(env('GOOGLE_API_KEY'));
    $youtube = new Google_Service_YouTube($client);

    //動画を取得
    $params = [
      'maxResults' => 10,
      'chart' => 'mostPopular',
      'regionCode' => 'jp'
    ];
    try {
      $Response = $youtube->videos->listVideos("snippet", $params);
    } catch (Google_Service_Exception $e) {
      echo $e->getMessage();
      exit;
    } catch (Google_Exception $e) {
      echo $e->getMessage();
      exit;
    }
    $view->with('movie', $Response);
  }
}
