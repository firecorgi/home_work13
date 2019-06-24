create database home_work7;
use home_work7;

drop table if exists articles;
create table articles
(
    id            int          not null AUTO_INCREMENT,
    cr_time       timestamp    not null default current_timestamp,
    title         varchar(400) not null,
    text          varchar(400) not null,

    primary key (id)
)
    engine = innodb,
    charset = utf8;
