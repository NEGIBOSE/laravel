<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;
use Mockery;
// use App\Models\ImageUpload\ImageManagerInterface;
use App\Modules\ImageUpload\ImageManagerInterface as ImageUploadImageManagerInterface;

class TweetServiceTest extends TestCase
{
    /**
     * @renInSeparateProcess
     * A basic unit test example.
     */
    public function test_check_own_tweet()
    {
        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('where->first')->andREturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        // $imageManager = Mockery::mock(ImageManagerInterface::class);
        $tweetService = new TweetService($imageManager); // TweetServiceのインスタンスを作成

        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);
    }
}
