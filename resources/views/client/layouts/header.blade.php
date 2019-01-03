<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



     <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.
0/css/font-awesome.min.css">

     <link 
href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.
css" rel="stylesheet">



    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>@yield('title')</title>





  

    <!-- Styles -->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">

</head>
<body>