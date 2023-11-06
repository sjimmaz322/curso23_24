#!/bin/bash

echo -n "Cual el el archivo a mirar: "
read ruta


    if grep -q "myfpschool" "$ruta.txt"; then
        echo "La contraseña myfpschool está en el archivo $ruta.txt"
    else
        echo "La contraseña myfpschool NO está en el archivo $ruta.txt"
    fi
