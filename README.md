# Database Project: Makelar

This is a simple web database system with PHP, HTML, CSS, and PostgreSQL.

## Getting Started

Before using files in this repository, you should first build your own RDS, whether you own it on your localhost or using cloud. If you are using cloud like me in AWS's RDS, the you should change the code as follows:

```
$db = pg_connect("host=[Endpoint] port=5432 dbname=database-name your-user password=your-password");
```

If you're new to AWS and wanted to try building this with AWS, you can see the tutorial on their [documentation](https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/CHAP_GettingStarted.html).

### Prerequisites

What things you need to install the software and how to install them

* [XAMPP](https://www.apachefriends.org/download.html)
* [PostgreSQL](https://www.postgresql.org/)

### Useful Links for Modification Purposes

* [Connecting PostgreSQL and PHP](https://www.w3resource.com/PostgreSQL/tutorial.php)
* [PHP Form Handling](https://www.w3schools.com/php/php_forms.asp)


## Authors

* **Ferlinda Feliana**- [Github](https://github.com/ferlinda)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* [W3School Template](https://www.w3schools.com/w3css/w3css_templates.asp)
* [Razorsql Table](https://razorsql.com/articles/postgresql_column_names_values.html)
* etc
