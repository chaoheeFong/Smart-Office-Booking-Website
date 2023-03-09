# Smart Office Booking Website
 A booking website that allows user to make reservation on public office. This program is created using Laravel.

#install Vue in Laravel
https://techvblogs.com/blog/how-to-install-vue-3-in-laravel-9-with-vite


#to run laravel with Vue
Insert 'npm run dev' into cmd then follow by 'php artisan serve' in another cmd.

#Setup
'cd SmartOffice'
'npm install' Install all dependencies that has used by others
'npm run dev' Run the dev server
'composer install' 
'php artisan serve'
'npm install --save-dev sass'

#Create Database
Database name: smartoffice


#Data migrations
'cd SmartOffice'
php artisan migrate:fresh --seed

#Database Seeding
php artisan db:seed UserSeeder



#Style documentation (PrimeFlex)
https://www.primefaces.org/primeflex/
https://primevue.org/icons
To include the style above to your code insert @vite('resources/js/app.js') at the head section of your html file
run 'npm install --save-dev sass' to use scss
