export async function peticionAsincrona(url , tipo , data = null)
{
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        },
    });

    let response = $.ajax({
            type: tipo,
            url: url,
            data: data,
            beforeSend: function (xhr) {
                // Agregar cabeceras de seguridad
                xhr.setRequestHeader("X-Content-Type-Options", "nosniff");
                xhr.setRequestHeader("X-Frame-Options", "DENY");
                xhr.setRequestHeader(
                    "Content-Security-Policy",
                    "default-src 'self'"
                );
            }
        });

    return response;
}
