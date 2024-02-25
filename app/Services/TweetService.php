<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ImageUpload\ImageManagerInterface;

class TweetService
{
    public function __construct(private ImageManagerInterface $imageManager)
    {}
    public function getTweets()
    {
        return Tweet::with('images')->orderBy('created_at', 'DESC')->get();
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
        DB::transaction(function () use ($userId, $content, $images) {
            $tweet = new Tweet;
            $tweet->user_id = $userId;
            $tweet->content = $content;
            $tweet->save();
            foreach ($images as $images) {
                $name = $this->imageManager->save($image);
                $imageModels = new Image();
                $imageModels->name = $name;
                $imageModels->save();
                $tweet->images()->attach($imageModels->id);
            }
        });
    }
    public function deleteTweet(int $tweetId)
    {
        DB::transaction(function () use ($tweetId) {
            $tweet = Tweet::where('id', $tweetId)->firstOrFail;
            $tweet->images()->each(function ($image) use ($tweet) {
                $this->imageManager->delete($image->name);
                $tweet->image()->detach($image->id);
                $image->delete();
            });
            $tweet->delete();
            }
        );
    }
}