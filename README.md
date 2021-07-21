<p align="center">
<img src="https://raw.githubusercontent.com/PHPJunior/mtube/master/public/images/logo.png?token=ADJUEVLKSZHIU3CH44SPD6DA66HA4" width="300">
</p>

## About mTube
mTube is a simple video sharing platform built with Laravel. Create personal channel share videos online with friends and family.

## Requirements
- FFMpeg
- PHP 7.3/8

## Installations
```
composer install
```

Edit `.env` file and `config/site.php`
``` 
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

LARAVEL_WEBSOCKETS_SSL_LOCAL_CERT=
LARAVEL_WEBSOCKETS_SSL_LOCAL_PK=
LARAVEL_WEBSOCKETS_SSL_PASSPHRASE=

FFMPEG_BINARIES=
FFPROBE_BINARIES=
```

``` 
[
    'converted_file_driver' => 'public',
    'hls_segment_size' => 10,
    'frame_from_seconds' => 3
]
```
Start Laravel Websockets Server
```
php artisan websockets:serve
```

## Todo
- [x] Channel Management
- [x] Channel Branding
- [x] Un/Subscribe Channel
- [ ] Realtime Un/Subscribe View
- [x] Video Management
- [x] Transcode Video
- [x] Dis/Like Video
- [x] Video View Count
- [x] Video Comments
- [x] Video Thumbnails
- [x] Video Settings
- [ ] Video Player - Google IMA Pre Roll Plugin
- [ ] Video Player - VAST Ad Plugin
- [ ] Admin Panel

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
