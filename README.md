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

## Building Database

```
create database makelar;
\c makelar

create table borrower
(borrowerid serial unique not null primary key,
name text not null,
email varchar(30) unique not null,
contact int unique not null);

create table makelar
(brokerid serial not null primary key,
buildingid serial not null,
borrowernum int not null,
startdate date not null,
enddate date not null,
bookingpartnerid int not null);

create table building
(buildingid serial not null primary key,
name text not null,
ownerid int not null,
price int not null,
status text not null);

create table buildingowner
(ownerid serial not null primary key,
name text not null,
contact int not null);

create table bookingpartner
(bookingpartnerid serial not null primary key,
website varchar(20) not null,
contact int not null);
```

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
