@extends('Layouts.main')

@section('getTitle'){{$language}} Wikipedia @endsection

@section('langcode'){{$langcode}}@endsection

@section('language'){{$language}}@endsection

@section('link'){{substr($link,1)}}@endsection

@section('title'){{$title}}@endsection

@section('article_count'){{$article_count}}@endsection

@section('picture'){{$feature_picture}}@endsection
