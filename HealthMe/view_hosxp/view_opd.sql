SELECT
  `s`.`vn`               AS `vn`,
  `p`.`hn`               AS `hn`,
  `s`.`vstdate`          AS `vstdate`,
  CONCAT(`p`.`pname`,`p`.`fname`,' ',`p`.`lname`) AS `ptname`,
  `p`.`sex`              AS `sex`,
  (YEAR(CURDATE()) - YEAR(`p`.`birthday`)) AS `age`,
  (YEAR(`p`.`birthday`) + 543) AS `birth_year`,
  `p`.`marrystatus`      AS `marrystatus`,
  `p`.`cid`              AS `cid`,
  `p`.`occupation`       AS `occupation`,
  `p`.`drugallergy`      AS `drugallergy`,
  `s`.`rr`               AS `rr`,
  `s`.`pulse`            AS `pulse`,
  `s`.`bps`              AS `bps`,
  `s`.`bpd`              AS `bpd`,
  `s`.`bw`               AS `bw`,
  `s`.`smoking_type_id`  AS `smoking_type_id`,
  `s`.`drinking_type_id` AS `drinking_type_id`,
  `s`.`height`           AS `height`,
  `s`.`waist`            AS `waist`
FROM (`patient` `p`
   LEFT JOIN `opdscreen` `s`
     ON ((`p`.`hn` = `s`.`hn`)))
WHERE (`s`.`bps` <> '')