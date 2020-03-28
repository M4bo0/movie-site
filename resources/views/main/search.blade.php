@extends('layouts.sample')

@section('title','検索結果')
@section('main')
@if (count($movie) ==0)
<div class="uk-text-muted uk-text-center">
    <h1>NOT FOUND</h1>
    <p>ヒットする動画がありません</p>
    <P>キーワードを変えて検索してください</P>
    <a href="index">TOPページに戻る</a>
</div>
@else
@foreach ($movie['items'] as $item)
        <div class="movieBox">
          <a class="movieLink uk-link-text" href='https://www.youtube.com/watch?v={{$item["id"]["videoId"]}}'>
          <div class="image">
            <img src="{{$item["snippet"]["thumbnails"]["default"]["url"]}}" width="200"/>
          </div>
            <div class="description">
              <div class="title">{{$item["snippet"]["title"]}}</div>
              {{$item["snippet"]["description"]}}
            </div>
          </a>
        </div>

@endforeach    
@endif
@endsection