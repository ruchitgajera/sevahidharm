<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('assets/font/arial.ttf')}}"> -->
  <link rel="stylesheet" href="{{asset('assets/fonts/ariblk.ttf')}}">
  <link rel="stylesheet" href="{{asset('assets/css/cropper.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('asset/css/style.css')}}"> -->
</head>


<body>
  @yield('content')
  <script src="{{asset('assets/js/jquery.slim.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/image.js')}}"></script>
  <script src="{{asset('assets/js/cropper.js')}}"></script>
  <script src="{{asset('assets/js/js.js')}}"></script>


  <script>
    function capture_image() {
      alert("capture_image");
      var p = webcam.capture();
      webcam.save();
      alert("capture complete " + p); 


      var img = canvas.toDataURL("image");
      var item_image = img.replace(/^data:image\/(png|jpg);base64,/, "");
      alert("item_image" + item_image);
    }
  </script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CME6XKZY5P"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CME6XKZY5P');
  </script>


</body>

</html>