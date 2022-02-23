#!/bin/bash -x
for package in $(apt upgrade 2>&1 |\
                 grep "falta ficheiro de lista de ficheiros '" |\
                 grep -Po "[^'\n ]+'" | grep -Po "[^']+"); do
    apt install --reinstall "$package";
done
