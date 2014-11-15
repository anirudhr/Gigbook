/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/
/*SP to insert concert information as the system / as a band that is playing in the concert. The same SP applies to both scenarios as differentiation will be done during call in backend PHP code.*/
DELIMITER //
CREATE PROCEDURE sp_band_insert_concert(IN inp_bname VARCHAR(20), IN inp_cname VARCHAR(20), IN inp_vname VARCHAR(20), IN inp_ctime CHAR(16), IN inp_tkturl VARCHAR(64), IN inp_cover DECIMAL) /*if inp_cname or inp_tkturl are NULL, they will be inserted as NULL values*/
BEGIN
    /*we do not need to check if inp_bname is a valid value present in band(bname). If system, we will be selecting inp_bname from a drop-down with values populated from band(bname). If band, inp_bname is the band's own name, which has to be in band(bname) in order for them to be logged in.*/
    INSERT INTO concert (cname, vname, ctime, tkturl, cover)
    VALUES (inp_cname, inp_vname, inp_ctime, inp_tkturl, inp_cover);
    DECLARE inp_cid INT;
    SELECT cid INTO inp_cid FROM concert
    WHERE vname = inp_vname AND ctime = inp_ctime; /*guaranteed 1 row because UNIQUE(vname, ctime)*/
    INSERT INTO rel_band_performs_concert (bname, cid)
    VALUES (inp_bname, inp_cid);
END//
DELIMITER ;
