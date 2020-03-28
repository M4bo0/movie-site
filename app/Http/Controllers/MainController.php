<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }
    public function search(Request $request)
    {
        $params = $request->params;
        $youtube = $request->youtube;
        try {
            $movie = $youtube->search->listSearch("snippet", $params);
        } catch (Google_Service_Exception $e) {
            echo $e->getMessage();
            exit;
        } catch (Google_Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return view('main.search', compact('movie'));
    }
    public function categories(Request $request)
    {
        $params = $request->params;
        $youtube = $request->youtube;
        try {
            $movie = $youtube->videos->listVideos("snippet", $params);
        } catch (Google_Service_Exception $e) {
            echo $e->getMessage();
            exit;
        } catch (Google_Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return view('main.categories', compact('movie'));
    }
}
