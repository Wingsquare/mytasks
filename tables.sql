create table if not exists tasks(
    id  int primary key auto_increment ,
    task_name varchar(100),
    task_remarks text,
    task_start_time timestamp,
    task_create_time bigint
);

create table if not exists categories(
    id int  primary key auto_increment,
    category_code   varchar(50) unique,
    category_name   varchar(100) unique,
    category_remarks text
);