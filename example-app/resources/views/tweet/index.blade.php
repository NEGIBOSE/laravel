<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>つぶやきアプリ</title>
    </head>
    <body>
        <h1>つぶやきアプリ</h1>
        <div>
            <p>投稿フォーム</p>
            <from action="{{ route('tweet.create') }}" method="post">
                @csrf
                <label for="tweet-content">つぶやき</label>
                <span>14文字まで</span>
                <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力"></textarea>
                <button type="submit">投稿</button>
                @error('tweet')
                <p style="color: red;">{{ $message }}</p>
                @enderror
            </from>
        </div>
    </body>
</html>