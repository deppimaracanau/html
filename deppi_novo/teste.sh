#!/bin/bash -x

arquivo="$1" 

while IFS= read -r linha || [[ -n "$linha" ]]; do
    
    apt-get install $linha -y
    echo "instalado o pacote $linha"
   # sleep 3
done < "$arquivo"
