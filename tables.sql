create table tasks(
    id  int autoincrement primary key,
    task_name varchar(100),
    remarks text,
    task_start_time bigint,
    task_create_time bigint,
);