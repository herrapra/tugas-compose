# tugas-compose
tcc-docker-compose

Tentang program

Aplikasi ini menghubungkan 2 buah kontainer yaitu untuk apache dan database mysql. images apache php dan mysql telah di push/upload ke docker hub. database yang digunakan untuk menjalankan aplikasi ini telah di include ke dalam images database mysql. aplikasi ini merupakan aplikasi sederhana berbasis php oop untuk CRUD data buku.

Nama Kelompok :

Dedi Irawan (145610053)
Ahmad Fauzi (145610054)
Anis Susilo (145610157)
Munifatul Arifah (145610162)
Link kontainer/images yang digunakan

Web server : https://hub.docker.com/r/tiknov/php/
Database : https://hub.docker.com/r/tiknov/mysql/
Cara Menjalankan

Pastikan telah mengistall docker, docker compose, dan git
Lakukan download dari repository ini atau lakukan perintah melalui terminal
 git clone https://github.com/irawand07/tcc-docker-compose 
Masuk ke direktori tcc-docker-compose dengan perintah
 cd tcc-docker-compose 
Jalankan perintah pada terminal
sudo docker-compose up -d
Jika sudah selesai buka browser ketikkan di url
http://localhost/
Selesai
