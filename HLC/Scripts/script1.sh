#!/bin/bash

NAME=$USER

if [[ $NAME == "Manolo" ]]; then
    echo "Hello Manolo"
else
    echo "$NAME, tú no eres Manolo, fuera"
fi

