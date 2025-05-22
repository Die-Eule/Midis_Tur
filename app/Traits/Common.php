<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Common
{
    public function deleteFile($path) {
        $relPath = array_reduce(explode('/', $path), function($carry, $item) {
            if ($carry) {
                $carry = $carry.'/'.$item;
            } else if (strcmp($item, 'dep') === 0) {
                $carry = $item;
            }
            return $carry;
        });

        Storage::delete($relPath);
    }
}
