#!/bin/bash

filename='archivo5.txt.gz'

gunzip -c $filename | cut -d " " -f 1-3 | while read -r col1 col2 col3; do
    echo "Columna 1: $col1"
    echo "Columna 2: $col2"
    echo "Columna 3: $col3"
    
    if [ "$col1" != "$col2" ] || [ "$col2" != "$col3" ] || [ "$col1" != "$col3" ]; then
    	echo 'Son distintas'
    else
    	echo 'Son iguales'
    fi 
    	
done

