create procedure diplay_transaction(IN mob_no int)
BEGIN
select balance from  wallet w where mobile_no=mob_no;
END;