docker run -d --name filebrowser \
    -v /downloads:/srv \
    -v ./database:/database \
    -v ./config:/config \
    -e PUID=$(id -u) \
    -e PGID=$(id -g) \
    -p 81:80 \
    --restart unless-stopped \
    filebrowser/filebrowser:s6
