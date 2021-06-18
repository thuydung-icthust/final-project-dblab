DELIMITER $$
CREATE TRIGGER after_request_update
AFTER UPDATE
ON importment_requests FOR EACH ROW
BEGIN
    IF OLD.status <> new.status THEN -- check if the status change from 0 -> 1 then add up the stock
        CALL add_ingredient_stock(new.request_id);
    END IF;
END$$
DELIMITER ;