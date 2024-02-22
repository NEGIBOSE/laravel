<?php
declare(strict_type=1);

namespace App\Modules\ImageUpload;

interface ImageManagerInterface {
    /**
     * @param \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $file
     * @return string
     */
    // 画像のアップロード
    public function save($file): string;

    // 画像の削除
    public function delete(string $name): void;
}
