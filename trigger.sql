create trigger add_balance 
after insert on transaction 
for each row 
update wallet set balance=balance+new.amount 
where mobile_no=new.mobile_no and new.t_type='add';









