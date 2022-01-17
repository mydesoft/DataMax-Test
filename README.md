This project was built with Laravel framework. It is an API driven CRUD application where books can be created, view, updated and deleted.
To work with this project create a database first (call it books). There are migrations file so with php artisan migrate command, the tables will be migrated.
All files needed is present including the vendor file and the .env file for easy setup. All you have to do is clone.
The project uses the repository design pattern. The book repository is sitted in the App/Repository directory.
Also, to access the views, all you have to do is serve the application.
Also, when trying to access the APIs endpoints, the content-type and Accept in the headers should be Application/json.
