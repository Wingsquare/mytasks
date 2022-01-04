create table tasks(
    id  int primary key auto_increment ,
    task_name varchar(100),
    task_remarks text,
    task_start_time bigint,
    task_create_time bigint
);