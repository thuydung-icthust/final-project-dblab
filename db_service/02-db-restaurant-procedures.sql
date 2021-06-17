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

DELIMITER ;