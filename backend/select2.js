$(document).ready(function(){

    $("#BuscarPacientes").select2({
            ajax: {
                url: "../../backend/buscarPacientes.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response,
                    };
                },
                cache: true
            }
        });
        $("form").submit(function(e) {
                if ($("#BuscarPacientes").val() === null || $("#BuscarPacientes").val() === '0') {
                    alert("Por favor, selecciona un paciente.");
                    e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                }
        });
    });

$(document).ready(function(){

    $("#BuscarMedicamentos").select2({
    ajax: {
        url: "../../backend/buscarMedicamentos.php",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                searchTerm: params.term // search term
            };
        },
        processResults: function (response) {
            return {
                results: response,
            };
        },
        cache: true
    }
    });
});

$(document).ready(function(){

    $("#BuscarEnfermedades").select2({
    ajax: {
        url: "../../backend/buscarEnfermedades.php",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                searchTerm: params.term // search term
            };
        },
        processResults: function (response) {
            return {
                results: response,
            };
        },
        cache: true
    }
});
    });