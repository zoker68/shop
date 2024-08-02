<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .content {
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 0.9em;
            color: #777777;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    @if ($header ?? false)
    <div class="header">
        <h2>{{ $header }}</h2>
    </div>
    @endif
    <div class="content">
        {{ $slot }}
    </div>
    <div class="footer">
        <p>{{ __('mail.footer', ['config' => config('app.name')]) }}</p>
    </div>
</div>
</body>
</html>
