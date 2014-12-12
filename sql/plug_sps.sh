#!/bin/bash
for i in `grep -l 'CREATE PROCEDURE' ./*.sql`; do mysql -uroot -ptoor < $i; done
