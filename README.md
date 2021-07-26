<p align="center">
<img src="https://raw.githubusercontent.com/PHPJunior/mtube/master/public/images/logo.png" width="400">
</p>

## About mTube
mTube is a simple video sharing platform built with Laravel. Create personal channel share videos online with friends and family.

## Packages
- [TusPHP](https://github.com/ankitpokhrel/tus-php)
- [Laravel Websockets](https://github.com/beyondcode/laravel-websockets)
- [Laravel Model Settings](https://github.com/cklmercer/laravel-model-settings)
- [Eloquent Viewable](https://github.com/cyrildewit/eloquent-viewable)
- [Laravel Vote](https://github.com/jcc/laravel-vote)
- [Laravel TALL Preset](https://github.com/laravel-frontend-presets/tall)
- [Livewire Modal](https://github.com/livewire-ui/modal)
- [Livewire](https://github.com/livewire/livewire)
- [Laravel Subscribe](https://github.com/overtrue/laravel-subscribe)
- [Laravel FFMpeg](https://github.com/protonemedia/laravel-ffmpeg)
- [Laravel Readable](https://github.com/Pharaonic/laravel-readable)
- [Laravel Livewire Tables](https://github.com/rappasoft/laravel-livewire-tables)
- [Active for Laravel](https://github.com/dwightwatson/active)

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
php artisan queue:work
```

## Todo
- [x] ~~Tus Server/Client~~
- [x] ~~Channel Management~~
- [x] ~~Channel Branding~~
- [x] ~~Un/Subscribe Channel~~
- [x] ~~Realtime Un/Subscribe View~~
- [x] ~~Video Management~~
- [x] ~~Transcode Video~~
- [x] ~~Dis/Like Video~~
- [x] ~~Video View Count~~
- [x] ~~Video Comments~~
- [x] ~~Video Thumbnails~~
- [x] ~~Video Settings~~
- [ ] Video Playlists
- [ ] Video Player - Google IMA Pre Roll Plugin
- [ ] Video Player - VAST Ad Plugin
- [ ] ~~Realtime Notifications ( Dis/Like, Un/Subscribe Channel, Comments )~~
- [ ] Admin Panel

## Credits
- All Contributors

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots
![screenshot 1](art/1.png)
![screenshot 2](art/2.png)
![screenshot 3](art/3.png)
![screenshot 4](art/4.png)
![screenshot 5](art/5.png)
![screenshot 6](art/6.png)
![screenshot 7](art/7.png)
![screenshot 8](art/8.png)
