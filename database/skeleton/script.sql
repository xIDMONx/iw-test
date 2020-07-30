CREATE DATABASE IF NOT EXISTS `iw` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `iw`;

drop table if exists users;
create table if not exists users
(
    id                int unsigned auto_increment primary key,
    name              varchar(255),
    last_name         varchar(255),
    age               int       not null default '0',
    telephone         varchar(10),
    email             varchar(255),
    email_verified_at timestamp,
    password          varchar(255),
    remember_token    varchar(100),
    created_at        timestamp not null default current_timestamp,
    updated_at        timestamp not null default current_timestamp on update current_timestamp
);

drop table if exists password_resets;
create table if not exists password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

drop table if exists movies;
create table if not exists movies
(
    id            int unsigned auto_increment primary key,
    id_user       int unsigned not null,
    name          varchar(255),
    gender        varchar(255),
    premiere_date date,
    descripcion   text,
    created_at    timestamp    not null default current_timestamp,
    updated_at    timestamp    not null default current_timestamp on update current_timestamp,
    foreign key (id_user) references users (id)
);
