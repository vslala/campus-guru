<!DOCTYPE html>
<html lang="en">
<head>
  <title>Campus Guru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!! Html::script("https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js") !!}
  {!! Html::script("http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js") !!}
  {!! Html::style("http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css") !!}
  {!! Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js") !!}
  {!! Html::style("css/styles.css") !!}
  {!! Html::style("http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css") !!}
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>--}}
  		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
          <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  {{--{!! Html::script("js/myjs.js") !!}--}}
  @yield("links")

</head>
<body>
@yield("header")

@yield("content")

@include('_postsModal')

@yield("footer")
</body>

</html>