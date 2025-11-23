#!/bin/bash
# Downgrade Docker CE dari versi 29 ke 28.x
# Tested on Ubuntu 22.04 Jammy

set -e  # Hentikan skrip jika terjadi error

echo "==> Menghentikan service Docker..."
sudo systemctl stop docker || true

echo "==> Menghapus paket Docker versi saat ini..."
sudo apt autoremove docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin -y

# Versi Docker yang ingin dipasang
VERSION_STRING="5:28.5.2-1~ubuntu.22.04~jammy"

echo "==> Menginstal Docker versi $VERSION_STRING ..."
sudo apt install \
  docker-ce=$VERSION_STRING \
  docker-ce-cli=$VERSION_STRING \
  containerd.io \
  docker-buildx-plugin \
  docker-compose-plugin -y

echo "==> Selesai! Mengecek versi Docker..."
docker --version
