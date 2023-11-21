#!/bin/bash
#ejemplo de backup
if [ -z "$1" ]; then
	 echo Modo de uso: $0 directorio
	 echo Introduza al menos un parámetro
	 exit
fi

ORIGEN=$1
DESTINO="/var/backups/"
FICH=backup-$(date +%Y%m%d).tgz
tar -cvZf $FICH $ORIGEN
