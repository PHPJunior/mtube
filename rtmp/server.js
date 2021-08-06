require('dotenv').config()

const NodeMediaServer = require('node-media-server');
const config = {
    rtmp: {
        port: 1935,
        chunk_size: 60000,
        gop_cache: true,
        ping: 30,
        ping_timeout: 60
    },
    http: {
        port: 3000,
        mediaroot: './storage/app/public',
        allow_origin: '*',
    },
    trans: {
        ffmpeg: process.env.FFMPEG_BINARIES,
        tasks: [
            {
                app: 'live',
                mp4: true,
                mp4Flags: '[movflags=frag_keyframe+empty_moov]',
                hls: true,
                hlsFlags: '[hls_time=2:hls_list_size=3:hls_flags=delete_segments]',
            }
        ]
    }
};

let nms = new NodeMediaServer(config);
nms.run();
