@auth
<div class="p-4">
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success')}}</p>
    @endif
    <form action="{{ route('tweet.create') }}" method="post">
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140文字までまで</span>
        <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
        <button type="submit">投稿</button>
        @error('tweet')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </form>
</div>
@endauth