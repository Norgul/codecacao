## Welcome to GitHub Pages

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
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will need to migrate from command line using `artisan migrate`

### Sample request

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