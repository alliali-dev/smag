$(document).ready(() => {
    // alert("Hello!\nYou are welcome!");
    let paramPeriode = $('#paramPeriode').val();
    let paramClasse = $('#paramClasse').val();
    let paramDiscipline = $('#paramDiscipline').val();
    console.log(paramPeriode,
        paramClasse,
        paramDiscipline,);
    $.ajax({
        type: "GET",
        url: "/notes/index/" + paramPeriode + "/" + paramClasse + "/" + paramDiscipline,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            // $("#paramPeriode").empty();
            // response.length > 0 ? [
            //     $("#paramEleve").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
            //     $.each(response, function (k, item) {
            //         $("#paramEleve").append(
            //             '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>');
            //     })] : null;


        }
    });


    $("#paramPeriode").on("click change", function () {
        $.ajax({
            type: "GET",
            url: "/notes/index/" + paramPeriode + "/" + paramClasse + "/" + paramDiscipline,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                // $("#paramEleve").empty();
                // response.length > 0 ? [
                //     $("#paramEleve").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
                //     $.each(response, function (k, item) {
                //         $("#paramEleve").append(
                //             '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>');
                //     })] : null;
            }
        });
    });

}
);