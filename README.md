# API Basic Auth (Native PHP)

API sederhana menggunakan Native PHP dengan sistem Basic Authentication dan dukungan CORS. Cocok untuk backend ringan, tes API, atau integrasi dengan frontend (React, Vue, Flutter, dsb).

## Struktur Folder

api_basic_auth/
├── .htaccess → Rewrite & CORS setup
├── auth.php → Contoh endpoint API dengan Basic Auth

## Cara Deploy

1. Upload folder ini ke hosting (misalnya InfinityFree, VPS Apache).
2. Pastikan .htaccess aktif dan mod_rewrite sudah enable.
3. Akses endpoint seperti:

   https://namadomain.com/api_basic_auth/auth

## Basic Authentication

Endpoint ini menggunakan Basic Auth.

Cara kirim header:

- Gunakan: Authorization: Basic base64(username:password)
- Contoh (username: admin, password: 1234):

  Authorization: Basic YWRtaW46MTIzNA==

## Contoh Request

CURL:

curl -X GET https://namadomain.com/api_basic_auth/auth \
 -H "Authorization: Basic YWRtaW46MTIzNA=="

JavaScript (Fetch):

fetch("https://namadomain.com/api_basic_auth/auth", {
headers: {
"Authorization": "Basic " + btoa("admin:1234")
}
})
.then(res => res.json())
.then(data => console.log(data));

## Contoh Response

Jika berhasil:

{
"status": "success",
"message": "Authenticated!"
}

Jika gagal:

{
"status": "error",
"message": "Unauthorized"
}

## CORS Support

API ini sudah mendukung CORS agar bisa diakses dari frontend lain:

Access-Control-Allow-Origin: \*
Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE
Access-Control-Allow-Headers: Content-Type, Authorization

## Requirements

- PHP 7.3 atau lebih baru
- Apache dengan mod_rewrite aktif
- Hosting yang support .htaccess (InfinityFree, cPanel, VPS)

## Lisensi

MIT License – bebas digunakan & dimodifikasi ✌️
