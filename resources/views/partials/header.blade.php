<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="shortcut icon" type="image/png" href="{{ asset('../assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('../assets/css/styles.min.css') }}" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .background-image {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('image/5315093.jpg') no-repeat center center;
            background-size: cover;
        }
      .besar {
      width: 120px;
      height: 100px;
      font-size: 25px;
      border: 1px solid black;
      margin: 1px;
      background-color: white;
      
      }

      .back {
      width: 120px;
      height: 100px;
      font-size: 25px;
      border: 1px solid black;
      margin: 1px;
      background-color: white;
      
      }

      .action {
      width: 120px;
      height: 100px;
      font-size: 25px;
      border: 1px solid black;
      margin: 1px;
      background-color: rgb(255,255,255);
      
      }

      .sangat-besar {
      width: 416px;
      height: 120px;
      font-size: 25px;
      color: white;
      border: 1px solid black;
      margin: 1px;
      background-color: rgb(70, 84, 235);
      
      }
  </style>
  <title>Cashier</title>
</head>
