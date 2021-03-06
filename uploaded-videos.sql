-- video list (database name ... videos)
drop database if exists videos;
create database videos character set utf8 collate utf8_general_ci;
  grant all on videos.* to 'admin'@'localhost' identified by 'password';
    use videos;

    create table list (
      title varchar(50) not null,
      uploader varchar(50) not null,
      uploaded_file varchar(50) not null
    );
