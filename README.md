## API

### Project description

This is a test project for calculating URI average rating.

### Project initialization

Project needs to be downloaded locally from this link: [Codecacao](https://github.com/Norgul/codecacao).
It is necessary to run `composer update` from the command line in order to pull all needed dependencies.

If you are using homestead virtual machine it is necessary to map the folder in which you've extracted the project with its link locally.

Add to `hosts`: `192.168.10.10 codecacao.dev`

Add to `homestead.yaml` under `sites`:

```
- map: codecacao.dev
  to: /home/vagrant/Code/codecacao/public
```

### Database installation
Program is using SQLite database for storing data locally. In order to initialize it correctly add the following to your `.env` file:

```
DB_CONNECTION=sqlite
```

Leave out all other attributes prefixed with `DB_`.

You will also need to create a `database.sqlite` file in `database` folder of the project either through IDE or through the shell by typing `touch database.sqlite`

You will need to migrate from command line using `artisan migrate`

### Sample request

`POST` request on `http://codecacao.dev/api/rating` route with the following body:

```
{
    "visitor_id": "123",
    "uri" : "myuri",
    "rating": "4"
}
```

`visitor_id` -> required, varchar(255)

`uri` -> required, varchar(255)

`rating` -> required, int(0, 10)


`Content-Type` header needs to be set to `Application/Json`

### Sample response

```
{
    "status": "success",
    "uri": "myuri",
    "rating": "4",
    "score": "3.5"
}
```

### Sample error response

```
{
    "status": "failure",
    "errors": {
        "rating": [
            "The rating must be between 1 and 10."
        ]
    }
}
```

### Check distinct URI

`GET` request on `http://codecacao.dev/api/uri/{uri}` returns URI object if it exists.

## Front-end /w jQuery

### Usage

`GET` request on `http://codecacao.dev/{uri}` returns URI object from the database if exists.
Existing objects are being updated by submission dynamically, while non existing objects are created upon entering the link
(provided with the `alert()` message that object was not in the database until now).

