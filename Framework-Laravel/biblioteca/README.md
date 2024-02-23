![](Aspose.Words.5f43dabe-f692-4140-ad55-3d8d63fe87c2.001.jpeg)

**Project carried out by**: Aleksander Trujillo Prokhorenko **Course**: 2 DAW B

**Year**: 2023/2024

**Project general description:**

The project is thinking about creating an application capable of managing a library, the registration part of new users who rent books, also registering new entries of books and authors to the library in addition to being able to manage who has a rented book and which one.

The technologies used in this project were the [Laravel Framework](https://laravel.com) of the [PHP](https://www.php.net/manual/es/intro-whatis.php) programming language. , within Laravel we use [Livewire](https://livewire.laravel.com/docs/quickstart) to make reactive frontends and [Carbon](https://carbon.nesbot.com/docs/) for date management .

For database management, [phpMyAdmin](https://www.phpmyadmin.net) from [XAMP](https://www.mysql.com)

Used versions:

- Laravel -> 10x
- PHP -> PHP 8.2.12 (cli) (built: Oct 24 2023 21:15:15) (ZTS Visual C++ 2019 x64)
- Composer -> version 2.6.6 2023-12-08 18:32:26
- XAMP -> 8.0.30 / PHP 8.0.30

**Project Structure:**

When using Laravel, the project is based on the [MVC](https://developer.mozilla.org/en-US/docs/Glossary/MVC) architecture, therefore we work with Models, Controllers and Views.

**Drivers**:

path: App/Http/Controllers/

Inside that folder we will find these files:

![](Aspose.Words.5f43dabe-f692-4140-ad55-3d8d63fe87c2.002.png)

They are created with Laravel syntax so that you link them directly to the model and avoid routing problems.

These controllers control exactly two routes, these are the creation routes and the insertion routes of data into the database.

Inserting data into the database uses a filter to validate the data and avoid having erroneous data in our system.

**Validations**:

path: App/Http/Requests/

Inside that folder we will find these files:

![](Aspose.Words.5f43dabe-f692-4140-ad55-3d8d63fe87c2.003.png)

We will use these files to validate fields in the form, to avoid having problems in the database.

We don't create the validations in the controller because that's not its job, so we create it as [CustomRequest](https://laravel.com/docs/10.x/validation#form-request-validation), in which We define the parameters of how we want these fields to be.

These files have two functions, one that returns true, which is what allows us to use validation, and the other function returns how these fields should be validated.

**Models**:

App/Models/ path

Inside that folder we will find these files:

![](Aspose.Words.5f43dabe-f692-4140-ad55-3d8d63fe87c2.004.png)

These are responsible for managing which data can be modified, which cannot and which can be hidden from the network, using the variables $fillable, $guarded, $hidden.

They are also responsible for relating the models to each other, that is, if a table has a 1 to N relationship as in the case of books and rentals, they are responsible for doing so using a hasMany and BelongsTo function.

**REACTIVE LOGIC**

**Livewire**

App/Livewire/ path

Inside that folder we will find these files:

![](Aspose.Words.5f43dabe-f692-4140-ad55-3d8d63fe87c2.005.png)

These files are responsible for making the application reactive, since we load the views from them, just as the editing and deleting processes are done without the need to refresh the browser in real time.

This is possible since Laravel's livewire package uses asynchronous requests in the background without us having to do anything, using a Vue-like syntax.

These files are structured in the following functions:

- mount() -> Hook that is activated when the page is rendered, we use it to initialize all the variables
- render() -> loads the view with all the data from the database, for manipulation
- edit(id) -> we obtain the id of the field that we want to modify and implement the component variables with these
- update() -> I obtain the object that we want to modify with the previous id, later we validate the fields and if they are correct we modify them
- resetInpust()-> is responsible for clearing all the fields after updating to avoid problems.
- rules()-> is responsible for validating all the data, it is a way to do it in livewire, they are like Custom Requests.

**BASE DATA**

![](Aspose.Words.5f43dabe-f692-4140-ad55-3d8d63fe87c2.006.jpeg)

The application has 5 tables, but we are really only going to use 4, which are Authors, Rentals, Books, Users, the fifth one that we do not use is the migrations table that Laravel creates for each time we make a modification.

**RELATIONSHIPS BETWEEN TABLES:**

- Books N — 1 Author
- Books 1 — 1 Rentals
- Users 1 — N Rentals

The connector that we use between the application and Laravel is found in the .env file that is in the root directory of the application, this file is a file in which all the environment variables are located, including the different connectors to base managers of data.

In our case when using XAMP, we are using [MySql](https://www.mysql.com) therefore in the Mysql variable we indicate the database name, username and password.

**ROUTES:**

Our routes to perform any operation on these tables are controlled by the WEB.PHP file, which is in charge, and is where we will indicate what URL we want them to have in the browser, the controller that we will use and the function for said route that manages it.

This file is located in: path: Root/routes/

For greater usability of these routes, all of them have their aliases assigned with ->name, for greater scalability or in case any modification is made to the route url, thus avoiding having to change it manually everywhere.

**VIEWS:**

All app views are located at:

path: Root/resources/views/

Within this we find different folders: 1.Layout folder:

Here we will find the components of our application, among them is our parent HTML from which all the views inherit their structure, this is called **app.blade.php**, in it we find a basic HTML 5 structure with different sections such as the title, body marked with the @yield directive, to be able to use it in other visas and indicate that we want our content to be within that section.

1. Layout>forms folder:

In this folder we will find all the data insertion forms in our application that extend from **app.blade.php**, all these forms have the @csrf directive to increase the security of the application and prevent data from reaching us from another site other than ours, it is a randomly formed Laravel token that verifies it.

2. Layout>partials folder:

Here we find the sidebar template of the application, this allows us to have access to all the views thanks to its buttons that are linked to the routes.

2.Livewire:

In this folder we have all the components that we use, these are rather the tables where we show the data from the database, in addition to editing and deleting.

3. Views

We have the views of all the tables, these extend from **app.blade.php, sidebar, livewire components** and thus we give structure to our application in a scalable and reusable way.

**CORRECT EXECUTION OF THE PROGRAM**

Create the database with all the tables:

php artisan migrate

Fill the database with data:

php artisan db:seed –class:AuthorSeed

php artisan db:seed –class:BookSeed

php artisan db:seed –class:UserSeed

php artisan db:seed –class:RentSeed Run the application

php artisan serve
