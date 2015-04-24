<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $title or '' }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!! Html::script("https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js") !!}
  {!! Html::script("http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js") !!}
  {!! Html::style("http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css") !!}
  {!! Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js") !!}
  {!! Html::style("css/styles.css") !!}
  {!! Html::script("js/scripts.js") !!}
  {!! Html::style("http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css") !!}
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>--}}
  		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
          <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  {{--{!! Html::script("js/myjs.js") !!}--}}

  <!-- Bootstrap Validation Css File -->
          {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.css') !!}

          {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css') !!}

          <!-- Javascript files for Bootstrap Validation Plugin -->
          {!! Html::script('http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.js') !!}

          {!! Html::script('http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js') !!}

  @yield("links")

</head>
<body>
@yield("header")

@yield("content")

@include('_postsModal')

@yield("footer")
</body>

</html>