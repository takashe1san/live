<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{URL::asset('post/style/style.css')}}">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <title>add Lic</title> 
</head>
<body>

    <div class="lec_form lec_formRun">
        <p>add License</p>
        {{-- <i id="closelec_form" class="bi bi-x-circle"></i> --}}
        <form action="#" method="post">
            <input type="text" name="num" placeholder="Number">
            <input type="text" name="typ" placeholder="Type">
            <input type="text" name="place" placeholder="Place">
            <input type="date" name="ini">
            <input type="date" name="exp">
            <button>Send</button>
        </form>
    </div>

    <script src="{{URL::asset('post/script/script.js')}}"></script>
    <script src="{{URL::asset('post/script/app.js')}}"></script>
    <script src="{{URL::asset('post/script/media.js')}}"></script>

</body>
</html>