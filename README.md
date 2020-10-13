## JWT Authentication API in Laravel 7  

`php artisan migrate`

`php artisan db:seed --class=UserSeeder`

create user using tinker \
`php artisan tinker` \

`$user = new User;` \
`$user->username = 'admin';` \
`$user->name = 'admin';`\
`$user->password = Hash::make('password');`\
`$user->save();


/api/login \
/api/logout \
/api/users 