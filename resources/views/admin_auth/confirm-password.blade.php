<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Confirm Password</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: #f2f2f2;
        }
        .container {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .box {
            display: flex;
            width: 800px;
            height: 400px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .left {
            flex: 1;
            background: #e74c3c;
            color: #fff;
            padding: 40px;
        }
        .left h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .right {
            flex: 1;
            background: #2c2c2c;
            color: #ccc;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border: none;
            border-bottom: 1px solid #666;
            background: transparent;
            color: #fff;
            font-size: 16px;
        }
        .right button {
            background: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }
        .error {
            color: #ff7675;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="box">
        <div class="left">
            <h1>Confirm Password</h1>
            <p>Please confirm your password before continuing</p>
        </div>
        <div class="right">
            <form method="POST" action="{{ route('admin.password.confirm') }}">
                @csrf

                <input type="password" name="password" placeholder="Password" required>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">Confirm</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
