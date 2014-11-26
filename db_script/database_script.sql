create database db_forum;
use db_forum;

create table tbl_post(
  id bigint auto_increment,
  subject varchar(255) not null,
  the_post text not null,
  modified_by int not null,
  modification_date date not null,
  primary key(id)
);

create table tbl_comment(
  id bigint auto_increment,
  post_id bigint not null,
  the_comment text not null,
  modified_by int not null,
  modification_date date not null,
  primary key(id),
  foreign key(post_id) references tbl_post(id)
);
