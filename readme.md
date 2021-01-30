# Website QurbanBerkah untuk MPPL (laravel)
Dibuat untuk menyelesaikan tugas :v
## Catatan dan masalah deployment
1. Di MySQL cukup buat DB aja (defaultnya qurbanberkah, edit di .env kalo beda)
2. Install folder `vendor` di folder. execute di folder proyeknya (pastikan ada composer)
```
composer install
```
3. Pakai migrations, jangan buat tabel sendiri
```
php artisan migrate
```
5. Belum sampe buat form, tapi udah install laravelcollective/html
```
composer require laravelcollective/html
```
6. User auth baru install dari bawaan laravel
```
composer require laravel/ui --dev
php artisan ui bootstrap --auth
npm install && npm run dev
```
7. DB ada 3, hewans, gambarhewans, users (bawaan laravel).

   Note: kenapa hewans bukan hewan, itu fitur dari laravel :v
   
   Note2: Kalo gak suka ganti di modelnya, tambahin attribute $table, selengkapnya cek [docs](https://laravel.com/docs/master/eloquent)
8. [artisan-view](https://github.com/svenluijten/artisan-view) < generate blade
9. Kalau bisa pakai vhostsnya Apache, menggunakan `php artisan serve` tidak dijamin
