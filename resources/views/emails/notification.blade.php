<!DOCTYPE html>

<html>
    <head>
        <style>

        </style>
    </head>
    <body>

        <p>{{ $m or "Test Mail From CampusGuru. Click on the link to go to campusguru." }}</p>

        <a href="{{ $link }}">
        <img src="http://www.campusguru.net/static/main-logo.png" /><br>
        Click here</a>

    </body>
</html>