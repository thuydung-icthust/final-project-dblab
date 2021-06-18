USE restaurant;

DELIMITER $$

CREATE PROCEDURE add_new_order(IN _customer_id INT, OUT _em_id INT, OUT _order_id INT)
    BEGIN
    DECLARE _employee_id INT DEFAULT 1;

    SELECT e.employee_id INTO _employee_id, COUNT(order_id) 
    FROM employees e 
    LEFT JOIN ( SELECT employee_id, order_id 
                FROM orders 
                WHERE TIMESTAMPDIFF(DAY, created_at, NOW()) <= 7) o 
    ON o.employee_id = e.employee_id 
    GROUP BY e.employee_id 
    ORDER BY COUNT(order_id) ASC
    LIMIT 1; 

    SET _em_id = _employee_id;

    INSERT INTO `orders`(
                `customer_id`,
                `employee_id`,
                `status`
            )
            VALUES(
                _customer_id,
                _employee_id,
                '0'
            );
    
    SELECT LAST_INSERT_ID() INTO _order_id;
    END$$

CREATE PROCEDURE add_new_import(IN _employee_id INT, OUT _req_id INT)
    BEGIN

    INSERT INTO `importment_requests`(
                `created_by`
            )
            VALUES(
                _employee_id
            );
    
    SELECT LAST_INSERT_ID() INTO _req_id;
    END$$


CREATE PROCEDURE add_ingredient_stock(IN _request_id INT)
    BEGIN
    DECLARE _ingredient_id INT;
    DECLARE _quantity INT;
    DECLARE _finished INT DEFAULT 0;
    DECLARE _curs CURSOR FOR SELECT ingredient_id, quantity FROM import_items WHERE request_id= _request_id;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET _finished = 1;

    OPEN _curs;
    addIngredient: LOOP
    FETCH _curs INTO _ingredient_id, _quantity;
    IF _finished = 1 THEN
        LEAVE addIngredient;
    END IF;
    -- actual add ingredient
    UPDATE ingredients SET quantity = quantity + _quantity WHERE ingredient_id = _ingredient_id;

    END LOOP addIngredient;

    CLOSE _curs;

    END$$

DELIMITER ;