#!/bin/bash -x 

for package in $(apt install --reinstall 2>&1 && apt upgrade -y 2>&1  |\
             grep "aviso: falta ficheiro de lista de ficheiros '" |\
             grep -Po "[^'\n ]+'" | grep -Po "[^']+"); do
    apt-get install --reinstall "$package";
done
