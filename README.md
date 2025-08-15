# 📚 Laravel Book Rating Project Timedoor Test - Arif

Project ini adalah sistem buku + rating dengan Laravel, MySQL, dan seeder data besar.

## 🚀 Langkah Instalasi

1. **Clone repository**
   git clone https://github.com/username/nama-project.git
   cd nama-project

2. **Install Dependencies**
   composer install

3. **copy.env dan konfigurasi**
   cp .env.example .env
   kemudian ubah :
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=timedoor_test_arif
   DB_USERNAME=root
   DB_PASSWORD=

4. **Generate key**
   php artisan key:generate

5. **Migrate & seed database**
   php artisan migrate
   jika db belum ada bisa di "yes" kan kalo
   php artisan db:seed

6. **Run Project**
   php artisan serve

7. **Akses Di Browser**
   http://127.0.0.1:8000 (default book page)
   http://127.0.0.1:8000/author (author page)
   http://127.0.0.1:8000/rating/create (create rating page)
