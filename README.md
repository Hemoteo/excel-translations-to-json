## Excel translations to JSON

El script se encuentra en `src/index.php` y debe recibir los siguientes argumentos:

- El path del fichero Excel a leer.
- El nombre del fichero JSON a generar (opcional).

Al finalizar, se genera el fichero JSON en el mismo directorio (`src`) con el nombre recibido o uno por defecto si no se ha especificado.

### Especificaciones del Excel

El Excel, debe ser como el del siguiente ejemplo:

     		| es			| en 			| fr 		| ...
    Quit	| Salir			| Exit			| Sortir	| ...
    Continue| Continuar		| Continue		| Continuer	| ...

- La primera fila, serán las claves de los idiomas a traducir.
- La primera columna, serán las claves de las traducciones.

### Estructura JSON generado

El JSON generado tendrá una estructura como la del siguiente ejemplo:

    {
    	"es": {
    		"Quit": "Salir",
    		"Continue": "Continuar"
    	},
    	"en": {
    		"Quit": "Exit",
    		"Continue": "Continue"
    	},
    	"en": {
    		"Quit": "Sortir",
    		"Continue": "Continuer"
    	}
    }
