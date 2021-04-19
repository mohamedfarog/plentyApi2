<?php

namespace App\Actions;

use App\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UploadHelper
{
    public function store($file, $type = 'products')
    {
        $path = '';
        switch ($type) {
            case 'products':
                $path = $file->store('products', ['disk' => "public"]);
                break;
            case 'shops':
                $path = $file->store('shops', ['disk' => "public"]);
                break;
            case 'styles':
                $path = $file->store('styles', ['disk' => "public"]);
                break;
            case 'profile':
                $path = $file->store('profiles', ['disk' => "public"]);
                break;

            case 'category':
                $path = $file->store('categories', ['disk' => "public"]);
                break;
            case 'tiers':
                $path = $file->store('tiers', ['disk' => "public"]);
            case 'slider':
                $path = $file->store('slider', ['disk' => "public"]);
                break;
            default:
                $path = $file->store('products', ['disk' => "public"]);
                break;
        }
        $filename = Arr::last(explode('/', "$path"));
        $filext = Arr::last(explode('.', "$filename"));
        $path = storage_path('app/public/' . $path);
        if ($filext == 'jpeg') {
            $source_image = imagecreatefromjpeg($path);
            $source_imagex = imagesx($source_image);
            $source_imagey = imagesy($source_image);
            $dest_imagex = $source_imagex / 2;
            $dest_imagey = $source_imagey / 2;
            $dest_image = imagecreatetruecolor($dest_imagex, $dest_imagey);
            imagecopyresampled(
                $dest_image,
                $source_image,
                0,
                0,
                0,
                0,
                $dest_imagex,
                $dest_imagey,
                $source_imagex,
                $source_imagey
            );

            switch ($type) {
                case 'products':
                    imagejpeg($dest_image, '../storage/app/public/products/compressed/' . $filename, 80);
                    break;
                case 'styles':
                    imagejpeg($dest_image, '../storage/app/public/styles/compressed/' . $filename, 80);
                    break;

                case 'shops':
                    imagejpeg($dest_image, '../storage/app/public/shops/compressed/' . $filename, 80);
                    break;

                case 'profile':
                    imagejpeg($dest_image, '../storage/app/public/profiles/compressed/' . $filename, 80);
                    break;

                case 'category':
                    imagejpeg($dest_image, '../storage/app/public/categories/compressed/' . $filename, 80);
                    break;
                case 'tiers':
                        imagejpeg($dest_image, '../storage/app/public/tiers/compressed/' . $filename, 80);
                        break;
                case 'slider':
                    imagejpeg($dest_image, '../storage/app/public/slider/compressed/' . $filename, 80);
                break;
                default:
                    imagejpeg($dest_image, '../storage/app/public/products/compressed/' . $filename, 80);
                    break;
            }


            return 'compressed/' . $filename;
        }
        return $filename;
    }
}
