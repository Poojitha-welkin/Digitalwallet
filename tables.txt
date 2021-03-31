create database peoplepay;
use peoplepay;



create table profile(mobile_no varchar(12) primary key, u_name char(30), email_id varchar(30), password varchar(30));


create table wallet(mobile_no varchar(12), foreign key(mobile_no) references profile(mobile_no), balance float);


create table transaction(mobile_no varchar(12), foreign key(mobile_no) references profile(mobile_no), transaction_id int(10) primary key, t_type varchar(10), 
amount float, drcr varchar(3));


create table add_to_wallet(transaction_id int(10), foreign key(transaction_id) references transaction(transaction_id), transaction_type varchar(25));


create table recharge(transaction_id int(10), foreign key(transaction_id) references transaction(transaction_id),recharge_no varchar(12), operator varchar(10));





create table send(transaction_id int(10), foreign key(transaction_id) references transaction(transaction_id), sender_number varchar(12),
foreign key(sender_number) references profile(mobile_no),receiver_trx_id int(10),foreign key(receiver_trx_id) references transaction(transaction_id));


create table receive(transaction_id int(10), foreign key(transaction_id) references transaction(transaction_id), receiver_number varchar(12),
foreign key(receiver_number) references profile(mobile_no),sender_trx_id int(10),foreign key(sender_trx_id) references transaction(transaction_id));




