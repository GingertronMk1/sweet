# Quick-Test 2020 - Jack Ellis, jackellis1504@gmail.com

### Q1

The code can be found in `/routes/console.php`.

Run `php artisan q1` for the result.

### Q2

See the `/app/Models/User.php` file for the code for the setter and getter, `/tests/Unit/ExampleTest.php` for the test code, and run `php artisan test` for output.

### Q3

The code can be found in `/routes/console.php`.

Run `php artisan q3` for the result.

### Q4

c, an abstract class, must be used.

### Q5

The `<=>` or spaceship operator is used to compare two expressions like so: `$a <=> $b`.
It returns -1 if $a < $b, 0 if $a == $b, and 1 if $a > $b.

It would be useful in a switch-case block, so where before you would have an ugly

```
if($a < $b) {
  thing1();
} else if ($a == $b) {
  thing2();
} else if ($a > $b) {
  thing3();
} else {
  // this should never be reached...
}
```

You would have a much nicer

```
switch($a <=> $b) {
  case -1:
    thing1();
    break;
  case 0:
    thing2();
    break;
  case 1:
    thing3();
    break;
  default:
    // this should never be reached...
}
```

### Q6

Polymorphism is the idea that one class can do many things depending on context, while sharing a common interface.
A common example is a function `foo` which performs different actions based upon what type of argument it receives.
It is useful because another function may output many types of data - PHP's `strpos` function returns either an integer or the boolean value FALSE depending upon its arguments, and being able to account for both within another function cuts down on extraneous and unnecessary code.

### Q7

The Scope Resolution Operator is a double colon (::)

For an example of its use, refer to `app/Models/User.php`, where there is a `public const USER_CONST`, equal to 23.

Run `php artisan tinker` and type `App\Models\User::USER_CONST`, and it will return 23, as it will anywhere else in the code that `use`s `App\Models\User`.

### Q8

See the `User` and `Post` models in `app/Models`.

In the migration for `Post` I've added a `user_id` column for the relation also.

### Q9

How I would deploy an application depends upon both the application, situation, and hosting platform.

In terms of updating an existing application I have worked with sites where deployment was simply to connect to the site server via an FTP client and drag files across in FileZilla.
This is super super not recommended.
More modern platforms however often have integration with Git providers like GitHub and Bitbucket - Laravel Forge and Heroku are examples of such.
In this case the deployment of an update for an application is as straightforward as merging the feature branch with the release branch (normally master), and in the case of a Laravel application performing all necessary migrations.

For deploying a fresh instance of an application I will use the example of Laravel Forge plus an existing SQL database.
The first step would be to set up a Forge server and provision it - the details of the provisioning are again application specific.
Once the server is provisioned and has an IP address I would go to my DNS provider and set up the records that point a web address to the IP of the server.
Back to the server on Forge to set up a New Site in their parlance, set the root domain to the web address set up in my DNS provider, then add a Git repository and pull.
Next I would make sure the site has an SSL certificate by going to the SSL panel of the site page in Forge, selecting Let's Encrypt, and selecting Obtain Certificate.
The final steps would be to modify the environment for the application with the database details and (assuming I've already added my SSH key to Forge) ssh into the server and run any migrations for Laravel/Symfony or access the site for wordpress to set up the db tables.

### Q10

I would use an interface when I want to scaffold a class that will be inherited by multiple other classes but that will not be instantiated itself.
For example an Animal class would have child classes Dog, Cat, Giraffe, and so on, however the Animal class itself would never be used, only ever a subclass of it.
