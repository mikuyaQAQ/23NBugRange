<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/login-style.css', 'resources/js/app.js', 'resources/js/login_main.js'])

</head>

<!-- js-fullheight 设置元素高度为浏览器窗口高度 -->

<body class="img js-fullheight" style="background-image: url({{ asset('images/bg.jpg') }});">

    <div id="app">
        <router-view>
            <Login />
        </router-view>
    </div>

</body>

</html>