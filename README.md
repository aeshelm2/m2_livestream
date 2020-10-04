# m2_livestream
Ongoing Project

# video player
videojs (modified)

# Installing Dependencies with a Package Manager
  sudo apt install libpcre3-dev libssl-dev zlib1g-dev

# nginx + rtmp intallation
sudo apt install nginx
sudo apt install libnginx-mod-rtmp 

# nginx.conf path
/etc/nginx/nginx.conf

# use nginx as webserver
https://devdocs.magento.com/guides/v2.4/install-gde/prereq/nginx.html

# nginx configuration (nginx.conf)
rtmp {
    server {
        listen 1935;
        chunk_size 4096;
        application live {
            live on;
            interleave on;
            #record off;
            hls on;
            hls_path /mnt/hls;
            hls_fragment 3s;
            hls_playlist_length 60;
            deny play all;
        }
    }
}

server {
        listen 8080;
        location /hls {
                add_header Cache-Control no-cache;

        # CORS setup
        add_header 'Access-Control-Allow-Origin' '*' always;
        add_header 'Access-Control-Expose-Headers' 'Content-Length,Content-Range';
        add_header 'Access-Control-Allow-Headers' 'Range';

        # allow CORS preflight requests
        if ($request_method = 'OPTIONS') {
            add_header 'Access-Control-Allow-Origin' '*';
            add_header 'Access-Control-Allow-Headers' 'Range';
            add_header 'Access-Control-Max-Age' 1728000;
            add_header 'Content-Type' 'text/plain charset=UTF-8';
            add_header 'Content-Length' 0;
            return 204;
        }

        types {
            application/vnd.apple.mpegurl m3u8;
            video/mp2t ts;
        }
            root /mnt/;
        }
}

types {
    application/vnd.apple.mpegurl m3u8;
    video/mp2t ts;
    text/html html;
}
