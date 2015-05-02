## Bat files

clc.bat, ens.bat and redb.bat files contain php app/console commands, that allow to clear cache and recreate mysql database from doctrine mapping files and fill it with data.

These bat files work on Windows. You must execute the commands manually, if you are working on other operating system.

* clc.bat - clears cache in product environment
* ens.bat - recreates entities from mapping files
* redb.bat - recreates database