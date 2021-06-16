USE restaurant;

DELIMITER $$

CREATE PROCEDURE add_new_order(IN _customer_id INT, OUT _em_id INT, OUT _order_id INT)
    BEGIN
    DECLARE _employee_id INT DEFAULT 1;

    SELECT `employee_id` INTO _employee_id FROM `orders` 
    WHERE TIMESTAMPDIFF(DAY, created_at, NOW()) <= 1 
    GROUP BY employee_id 
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

--  select ing.ingredient_id, ing.name, sum(pi.ingredient_quantity * ord.quantity) as `quantity`, ing.stock_quantity from 
--  (select product_id, order_id, quantity from order_items where order_id=1) ord
--  inner join 
--  (select product_id, ingredient_id, quantity as `ingredient_quantity` from product_include) pi
--  on pi.product_id = ord.product_id 
--  inner join (select name, quantity as `stock_quantity`, ingredient_id from ingredients) ing 
--  on pi.ingredient_id = ing.ingredient_id 
--  group by pi.ingredient_id;

-- select * from 
-- (select product_id, `NAME` from products) prd
-- inner join 
-- (select product_id, order_id, quantity from order_items) ord
-- on ord.product_id=prd.product_id 
-- inner join 
-- (select product_id, ingredient_id, quantity as `ingredient_quantity` from product_include) pi
-- on pi.product_id = ord.product_id 
-- inner join (select name, quantity as `stock_quantity`, ingredient_id from ingredients) ing 
-- on pi.ingredient_id = ing.ingredient_id 
-- where ord.order_id=1;