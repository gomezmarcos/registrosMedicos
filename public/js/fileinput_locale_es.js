/*!
 * FileInput Spanish Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";

    $.fn.fileinputLocales['es'] = {
        fileSingle: 'archivo',
        filePlural: 'archivos',
        browseLabel: 'Examinar &hellip;',
        removeLabel: 'Quitar',
        removeTitle: 'Quitar archivos seleccionados',
        cancelLabel: 'Cancelar',
        cancelTitle: 'Abortar la subida en curso',
        uploadLabel: 'Subir archivo',
        uploadTitle: 'Subir archivos seleccionados',
        msgZoomTitle: 'Ver detalles',
        msgZoomModalHeading: 'Vista previa detallada',
        msgSizeTooLarge: 'Archivo "{name}" (<b>{size} KB</b>) excede el tamaÃ±o mÃ¡ximo permitido de <b>{maxSize} KB</b>.',
        msgFilesTooLess: 'Debe seleccionar al menos <b>{n}</b> {files} a cargar.',
        msgFilesTooMany: 'El nÃºmero de archivos seleccionados a cargar <b>({n})</b> excede el lÃ­mite mÃ¡ximo permitido de <b>{m}</b>.',
        msgFileNotFound: 'Archivo "{name}" no encontrado.',
        msgFileSecured: 'No es posible acceder al archivo "{name}" porque estarÃ¡ siendo usado por otra aplicaciÃ³n o no tengamos permisos de lectura.',
        msgFileNotReadable: 'No es posible acceder al archivo "{name}".',
        msgFilePreviewAborted: 'PrevisualizaciÃ³n del archivo "{name}" cancelada.',
        msgFilePreviewError: 'OcurriÃ³ un error mientras se leÃ­a el archivo "{name}".',
        msgInvalidFileType: 'Tipo de archivo no vÃ¡lido para "{name}". SÃ³lo archivos "{types}" son permitidos.',
        msgInvalidFileExtension: 'ExtensiÃ³n de archivo no vÃ¡lido para "{name}". SÃ³lo archivos "{extensions}" son permitidos.',
        msgValidationError: 'Error al subir archivo',
        msgLoading: 'Subiendo archivo {index} de {files} &hellip;',
        msgProgress: 'Subiendo archivo {index} de {files} - {name} - {percent}% completado.',
        msgSelected: '{n} {files} seleccionado(s)',
        msgFoldersNotAllowed: 'Arrastre y suelte Ãºnicamente archivos. Omitida(s) {n} carpeta(s).',
        msgImageWidthSmall: 'El ancho de la imagen "{name}" debe ser al menos {size} px.',
        msgImageHeightSmall: 'La altura de la imagen "{name}" debe ser al menos {size} px.',
        msgImageWidthLarge: 'El ancho de la imagen "{name}" no puede exceder de {size} px.',
        msgImageHeightLarge: 'La altura de la imagen "{name}" no puede exceder de {size} px.',
        dropZoneTitle: 'Arrastre y suelte aquÃ­ los archivos &hellip;',
        fileActionSettings: {
            removeTitle: 'Eliminar archivo',
            uploadTitle: 'Subir archivo',
            indicatorNewTitle: 'No subido todavÃ­a',
            indicatorSuccessTitle: 'Subido',
            indicatorErrorTitle: 'Subir Error',
            indicatorLoadingTitle: 'Subiendo ...'
        }
    };
})(window.jQuery);
