# admin-server

Server spesifikasi tester. Modul ini menampilkan semua hasil test server yang dibutuhkan
masing-masing modul untuk bisa berjalan dengan baik. Spesifikasi server diambil
dari konfigurasi aplikasi `_server`.

Konfigurasi masing-masing modul disusun seperti berikut:

```php
// ./modules/[modul]/config.php

return [
    ...
    '_serveri' => [
        'Nginx Server'  => 'Module\\Library\\Server::test'
    ],
    ...
];
```

Dengan konfigurasi seperti di atas, modul ini akan memanggil static method `test` 
dari class `Module\Library\Server` dan mengharapkan pengembalian dengan format
array seperti berikut:

```php

$res = Module\Library\Server::test();
// array(
//  'success'   => true,  // true atau false
//  'info'      => 'Tambahan info yang akan ditampilkan'
// );
```