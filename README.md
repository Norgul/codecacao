## Welcome to GitHub Pages

You can use the [editor on GitHub](https://github.com/Norgul/codecacao/edit/master/README.md) to maintain and preview the content for your website in Markdown files.

Whenever you commit to this repository, GitHub Pages will run [Jekyll](https://jekyllrb.com/) to rebuild the pages in your site, from the content in your Markdown files.

### Markdown

Markdown is a lightweight and easy-to-use syntax for styling your writing. It includes conventions for

```markdown
Syntax highlighted code block

# Header 1
## Header 2
### Header 3

- Bulleted
- List

1. Numbered
2. List

**Bold** and _Italic_ and `Code` text

[Link](url) and ![Image](src)
```

For more details see [GitHub Flavored Markdown](https://guides.github.com/features/mastering-markdown/).

### Jekyll Themes

Your Pages site will use the layout and styles from the Jekyll theme you have selected in your [repository settings](https://github.com/Norgul/codecacao/settings). The name of this theme is saved in the Jekyll `_config.yml` configuration file.

### Support or Contact

Having trouble with Pages? Check out our [documentation](https://help.github.com/categories/github-pages-basics/) or [contact support](https://github.com/contact) and we’ll help you sort it out.

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
'uri' -> required, varchar(255),
'rating' -> required, int(0, 10)

### Sample response

```
{
    "status": "success",
    "uri": "myuri",
    "rating": "4",
    "score": "3.5"
}
```

### Error response

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