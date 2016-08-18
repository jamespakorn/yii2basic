SELECT
  `o`.`lab_order_number` AS `lab_order_number`,
  `o`.`lab_items_code`   AS `CODE`,
  `i`.`lab_items_name`   AS `lab`,
  `o`.`lab_order_result` AS `result`,
  `i`.`lab_items_unit`   AS `unit`,
  `i`.`icode`            AS `icode`,
  CONCAT(`p`.`pname`,`p`.`fname`,' ',`p`.`lname`) AS `ptname`,
  `p`.`cid`              AS `cid`,
  `h`.`hn`               AS `hn`,
  `h`.`vn`               AS `vn`,
  `h`.`order_date`       AS `order_date`
FROM (((`lab_order` `o`
     LEFT JOIN `lab_head` `h`
       ON ((`o`.`lab_order_number` = `h`.`lab_order_number`)))
    LEFT JOIN `lab_items` `i`
      ON ((`o`.`lab_items_code` = `i`.`lab_items_code`)))
   LEFT JOIN `patient` `p`
     ON ((`h`.`hn` = `p`.`hn`)))
WHERE ((`o`.`lab_order_result` <> '')
       AND (`i`.`icode` IN('3070164','3070093','3070094','3070095','3070096','3070097','3070098','3070101','3070235')))
       
      