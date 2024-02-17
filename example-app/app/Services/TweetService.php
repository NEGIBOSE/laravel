<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TweetService
{
    public function getTweets()
    {
        return Tweet::with('images')->orderBy('created_at', 'DWSC')->get();
    }

    //自分のTweetかどうかをチェックするメソッド
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet){
            return false;
        }

        return $tweet->user_id === $userId;
    }

    public function saveTweet(int $userId, string $content, array $images)
    {
        DB:transaction(function () use ($userId, $content, $images) {
            $tweet = new Tweet;
            $tweet->user_id = $userId;
            $tweet->content = $content;
            $tweet->save();
            foreach ($images as $images) {
                Storage::putFile('public/images', $images);
                $imageModels = new Image();
                $imageModels->name = $image->hashName();
                $imageModels->save();
                $tweet->images()->attach($imageModels->id);
            }
        });
    }
}