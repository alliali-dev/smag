$(document).ready(function (e) {
    $(document).ready(function () {
        setTimeout(() => {
            $("#showMessage").empty();
        }, 20000);
    });
    $('i[class="fa fa-times text-white"]').on('click', function () {
        $("input[name='note']").attr("value", '');
    });
    // $("a").on("click", function (r) {
    //     let li = $(this).attr('href');
    //     $(location).attr('href', li);
    //     r.preventDefault();
    // });
    let time = new Date().getSeconds();
    $('#libelForNivYear').on('change', function () {
        let libelForNiv = $("#libelForNivYear option:selected").text();
        // console.log(libelForNiv);
        switch (libelForNiv) {
            case "1er Cycle":
                // console.log($(this).val());
                $("#niveau").empty();
                $("#niveau").append(
                    '<option value="" selected disabled>Choisissez le niveau</option>' +
                    '<option value="6ème">6ème</option> ' +
                    '<option value="5ème">5ème</option>' +
                    '<option value="4ème">4ème</option>' +
                    '<option value="3ème">3ème</option> '
                );
                break;
            case "2e Cycle":
                // console.log($(this).val());
                $("#niveau").empty();
                $("#niveau").append(
                    '<option value="" selected disabled>Choisissez le niveau</option>' +
                    '<option value="2nde">2nde</option> ' +
                    '<option value="1ère">1ère</option>' +
                    '<option value="Tle">Tle</option>'
                );
            default: null;
                break;
        }

    });
    // niveau for serie
    $('#niveauS').on('change', function () {
        let libNiveau = $("#niveauS option:selected").text();
        console.log(libelForNiv);
        $("#serie").empty();
        switch (libNiveau) {
            case "2nde":
                $("#serie").empty();
                $("#serie").append(
                    '<option value="" selected disabled>Choisissez la série</option>' +
                    '<option value="A">A</option>' +
                    '<option value="C">C</option>'
                );
                break;
            case "1ère":
                $("#serie").empty();
                $("#serie").append(
                    '<option value="" selected disabled>Choisissez la série</option>' +
                    '<option value="A1">A1</option>' +
                    '<option value="A2">A2</option>' +
                    '<option value="C">C</option>' +
                    '<option value="D">D</option>'
                );
                break;
            case "Tle":
                $("#serie").empty();
                $("#serie").append(
                    '<option value="" selected disabled>Choisissez la série</option>' +
                    '<option value="A1">A1</option>' +
                    '<option value="A2">A2</option>' +
                    '<option value="C">C</option>' +
                    '<option value="D">D</option>'
                );
            default: null;
                break;
        }

    });

    $("#periodeFromYear").click(function () {
        $("#yearToPeriod option:selected").val() == 0 ? [alert("Veuillez choisir l'année d'abord!"), $("#yearToPeriod").focus(), $("#yearToPeriod").css('border-color', 'red')] : [$(this).focus(), $("#yearToPeriod").css('border-color', 'green')];
    });
    $('#yearToPeriod').on('change', function (el) {
        // alert('bonjour');
        let anId = $(this).val();
        // let ur = $(location).attr('href') + '/' + anId;
        let url = "create/" + anId;
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // console.log(data); 
                $("#periodeFromYear").empty();
                data.length > 0 ? $.each(data, function (key, item) {
                    $("#periodeFromYear").append('<option value="' + item.pId + '">' + item.design + '</option>');
                }) : null;
            }

        });
    });
    // year for niveau
    $("#anneeN").val() != null ? $.ajax({
        type: "get",
        url: "create/" + $("#anneeN").val(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // console.log(data);
            $("#niveau").empty();
            $("#libelForNivYear").empty();
            $("#libelForNivYear").append('<option value="" selected disabled>Choisissez le libellé du cycle</option>');
            data.length > 0 ? $.each(data, function (ke, dat) {
                $("#libelForNivYear").append(
                    '<option value="' + dat.codeCy + '">' + dat.design + '</option>'
                );
            }) : null;
        }
    }) : $("#libelForNivYear").append('<option value="" disabled>Veuillez choisir l\'année d\'abord!</option>');
    $("#anneeN").on("change", function (x) {
        $.ajax({
            type: "get",
            url: "create/" + $("#anneeN").val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // console.log(data);
                $("#niveau").empty();
                $("#libelForNivYear").empty();
                $("#libelForNivYear").append('<option value="" selected disabled>Choisissez le libellé du cycle</option>');
                data.length > 0 ? $.each(data, function (ke, dat) {
                    $("#libelForNivYear").append(
                        '<option value="' + dat.codeCy + '">' + dat.design + '</option>'
                    );
                }) : null;
                // libelForNivYear
            }
        });
        x.preventDefault();
    });
    //year for serie
    $("#anneeS").val() != null ? $.ajax({
        type: "get",
        url: "create/" + $("#anneeS").val(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // console.log(data);
            $("#niveauS").empty();
            data.length > 0 ? [$("#niveauS").append('<option value="" selected disabled>Choisissez le niveau</option>'), $.each(data, function (ke, dat) {
                $("#niveauS").append(
                    '<option value="' + dat.codeNi + '">' + dat.niv + '</option>'
                );
            })] : null;
        }
    }) : $("#serie").append('<option value="" disabled>Veuillez choisir l\'année d\'abord!</option>');
    $("#anneeS").on("change", function (x) {
        $.ajax({
            type: "get",
            url: "create/" + $("#anneeS").val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // console.log(data);
                $("#niveauS").empty();
                data.length > 0 ? [$("#niveauS").append('<option value="" selected disabled>Choisissez le niveau</option>'), $.each(data, function (ke, dat) {
                    $("#niveauS").append(
                        '<option value="' + dat.codeNi + '">' + dat.niv + '</option>'
                    );
                })] : null;
                // libelForNivYear
            }
        });
        x.preventDefault();
    });
    //classe
    $('#classe').on('change', function (el) {
        // alert('bonjour');
        let classe = $(this).val();
        // console.log(classe);
        // let ur = $(location).attr('href') + '/' + anId;

        let url = "create/" + classe + "/" + time;
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (datas) {

                // console.log(datas['data'][0]);
                $("#eleve").empty();
                datas['data'].length > 0 ? $.each(datas['data'], function (key, item) {
                    $("#eleve").append('<option value="' + item.elId + '">' + item.ref + " | " + item.firstname + " " + item.lastname + '</option>');
                }) : null;


                // let disciplineTextChecked = $('input[name="discipline"]').data('name');
                let disciplineTextChecked = $('input[name="discipline"]:checked').next('label').text();
                // niveau
                datas['niveau'].length > 0 ? $.each(datas['niveau'], function (key, niv) {
                    switch (niv.niveau) {
                        case "6ème":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;

                                default:
                                    break;
                            }

                            break;
                        case "5ème":
                            // console.log(disciplineTextChecked);
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }


                            break;
                        case "4ème":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "3ème":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;

                        default:

                            break;
                    }

                }) : null;

                // serie
                datas['series'].length > 0 ? $.each(datas['series'], function (key, ser) {
                    switch (ser.serie) {
                        case "2nde A":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;

                                default:
                                    break;
                            }

                            break;
                        case "2nde C":
                            // console.log(disciplineTextChecked);
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "1ère A1":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "1ère A2":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "1ère C":
                            // console.log(disciplineTextChecked);
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "1ère D":
                            // console.log(disciplineTextChecked);
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "Tle A1":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                // case "Physique-Chimie":
                                //     $("#coef_disc").attr("value", 1);
                                //     break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "Tle A2":
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                // case "Physique-Chimie":
                                //     $("#coef_disc").attr("value", 2);
                                //     break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "Tle C":
                            // console.log(disciplineTextChecked);
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 5);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case "Tle D":
                            // console.log(disciplineTextChecked);
                            switch (disciplineTextChecked) {
                                case "Anglais":
                                    // console.log(disciplineTextChecked);
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Allemand":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Espagnol":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Éducation Physique et Sportive":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arts Plastiques":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Musique":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Histoire-Geographie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Français":
                                    $("#coef_disc").attr("value", 3);
                                    break;
                                case "Philosophie":
                                    $("#coef_disc").attr("value", 2);
                                    break;
                                case "Mathématiques":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Physique-Chimie":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Sciences de la vie et de la terre":
                                    $("#coef_disc").attr("value", 4);
                                    break;
                                case "Conduite":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Arabe":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Chinois":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                case "Grec":
                                    $("#coef_disc").attr("value", 1);
                                    break;
                                default:
                                    break;
                            }
                            break;
                        default:
                            break;
                    }

                }) : null;
            }

        });
    });
    // type evaluation
    $('#typEv').on('change', function () {
        let typeEval = $(this).val();
        // console.log(typeEval);
        switch (typeEval) {
            case "Interrogation":
                $("#coef").attr('value', 1);
                break;
            case "Devoir de classe":
                $("#coef").attr('value', 1);
                break;
            case "Devoir de niveau":
                $("#coef").attr('value', 2);
            case "Examen blanc":
                $("#coef").attr('value', 2);
                break;

            default: null;
                break;
        }
    });
    //envoi evaluat
    // $('#addEvalForm').on('submit', function (e) {
    //     let yearToPeriod = $("#yearToPeriod").val();
    //     let periodeFromYear = $("#periodeFromYear").val();
    //     let classe = $("#classe").val();
    //     let eleve = $("#eleve").val();
    //     let discipline = $('input[name="discipline"]:checked').val();
    //     let coef_disc = $("#coef_disc").val();
    //     let typEv = $("#typEv").val();
    //     let coef = $("#coef").val();
    //     let note = $("#note").val();
    //     let prof = $("#prof").val();
    //     // console.log("note:" + note + ";coef_disc:" + coef_disc + ";coef:" + coef + ";type:" + typEv);
    //     yearToPeriod == null ? $("#yearToPeriod").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     periodeFromYear == null ? $("#periodeFromYear").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     classe == null ? $("#classe").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     eleve == null ? $("#eleve").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     discipline == '' ? $("#discipline").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     coef_disc == '' ? $("#coef_disc").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     typEv == null ? $("#typEv").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     coef == '' ? $("#coef").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     note == '' ? $("#note").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     prof == null ? $("#prof").after('<span class="text text-danger">Ce champ est requis.</span>') : $(".text text-danger").empty();
    //     $.ajax({
    //         url: '/evaluations',
    //         type: "post",
    //         data: {
    //             yearToPeriod: yearToPeriod,
    //             periodeFromYear: periodeFromYear,
    //             classe: classe,
    //             eleve: eleve,
    //             discipline: discipline,
    //             coef_disc: coef_disc,
    //             typEv: typEv,
    //             coef: coef,
    //             note: note,
    //             prof: prof,
    //         },
    //         dataType: "html",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         error: function (response) {
    //             // console.log(response);
    //         },

    //         success: function (response) {
    //             if (response) {
    //                 // response = $.parseJSON(response);
    //                 $("#showMessage").append(
    //                     '<div class="alert alert-success  alert-dismissible fade show" role="alert" style="background-color:green; color:white;">' +
    //                     'Evaluation ajoutée avec succès' +
    //                     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
    //                     '</div>');
    //                 $("#note").attr('value', '');
    //                 setTimeout(() => {
    //                     $("#showMessage").empty();
    //                 }, 5000);
    //             } else {
    //                 $("#showMessage").append('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
    //                     'évaluation non ajoutée!' +
    //                     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    //                 );
    //             }
    //         }
    //     });
    //     e.preventDefault();

    // });

    // search student
    $('select[name="paramAn"]').on('change', function (d) {
        // alert("Morning");
        let quest = confirm("Voulez-vous afficher les élèves de l'année sélectionnée?");
        //  console.log(quest);
        let va = $(this).val();
        quest == true ? $.ajax(
            {
                type: 'get',
                url: "eleves/index/" + va,
                // +"/"+time,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    response["eleves"].length > 0 ? [
                        $('#grid-row').empty(),
                        $('#cmp').empty(),
                        $('#cmp').append('(' + response["eleves"].length + ')'),
                        $("tbody").empty(),
                        $.each(response["eleves"], function (key, item) {
                            $("#grid-row").append(
                                '<div class="col-lg-4 col-md-6 col-sm-6 col-12">' +
                                '<div class="card card-profile">' +
                                '<div class="card-header justify-content-end pb-0 border-0">' +
                                '<div class="dropdown">' +
                                ' <button class="btn btn-link" type="button" data-bs-toggle="dropdown">' +
                                '<span class="dropdown-dots fs--1"></span>' +
                                '</button>' +
                                '<div class="dropdown-menu dropdown-menu-right border py-0">' +
                                ' <div class="py-2">' +
                                '<a class="dropdown-item" href="/eleves/' + item.idElev + '/edit">Modifier</a>' +
                                '<!-- <a class="dropdown-item text-danger" href="javascript:void(0);">Supprimer</a> -->' +
                                '</div>' +
                                '</div>' +
                                ' </div>' +
                                ' </div>' +
                                ' <div class="card-body pt-2">' +
                                '<div class="text-center">' +
                                '<div class="profile-photo">' +
                                '<img src="/assets/images/eleves/' + item.avatar + '" width="100" class="img-fluid rounded-circle" alt="">' +
                                '</div>' +
                                '<h3 class="mt-4 mb-1">' + item.firstname + '</h3>' +
                                '<p class="text-muted">' + item.lastname + '</p>' +
                                '<ul class="list-group mb-3 list-group-flush">' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Genre :</span><strong>' + item.genre + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Date de naissance :</span>' +
                                '<strong>' + item.birthday + '</strong>' +
                                '</li>' +
                                ' <li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Lieu de naissance :</span>' +
                                '<strong>' + item.lieu + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Nationalite:</span>' +
                                '<strong>' + item.nation + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Matricule:</span>' +
                                ' <strong>' + item.code + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Redoublant:</span>' +
                                '<strong>' + item.statut + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Regime:</span>' +
                                '<strong>' + item.regim + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Affect&eacute;(e):</span>' +
                                '<strong>' + item.affected + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Ann&eacute;(e):</span>' +
                                '<strong>' + item.annee + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Classe:</span>' +
                                '<strong>' + item.classe + '</strong>' +
                                '</li>' +
                                '<li class="list-group-item px-0 d-flex justify-content-between">' +
                                '<span class="mb-0">Inscrit(e) le:</span><strong>' + item.createdate + '</strong>' +
                                '</li>' +
                                '</ul>' +
                                // '<a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="">Voir plus</a>'+
                                '</div>' +
                                '</div>' +
                                ' </div>' +
                                '</div>' +
                                '<!-- pagination grille -->'
                            );

                            $("tbody").append(
                                '<tr>' +
                                '<td>' +
                                '<img src="/assets/images/eleves/' + item.avatar + '" width="100" class="img-fluid rounded-circle" alt="">' +
                                '</td>' +
                                '<td>' + item.firstname + '</td>' +
                                '<td>' + item.lastname + '</td>' +
                                '<td>' + item.genre + '</td>' +
                                '<td>' + item.birthday + '</td>' +
                                '<td>' + item.lieu + '</td>' +
                                '<td>' + item.nation + '</td>' +
                                '<td>' + item.code + '</td>' +
                                '<td>' + item.statut + '</td>' +
                                '<td>' + item.regim + '</td>' +
                                '<td>' + item.affected + '</td>' +
                                '<td>' + item.annee + '</td>' +
                                '<td>' + item.classe + '</td>' +
                                '<td>' + item.createdate + '</td>' +
                                '<td>' +
                                '<a href="/eleves/' + item.idElev + '/edit"  class="btn btn-xs sharp btn-primary"><i class="fa fa-pencil"></i></a>' +
                                '<a href="javascript:void(0);" class="btn btn-xs sharp btn-danger"><i class="fa fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>' +
                                //     '</tbody>'+
                                //  '</table>'+
                                '<hr>'
                                // <div class="row" style="float:right;">
                                //     <nav class="nav text-right">{{$eleves->links('pagination::bootstrap-4')}}</nav>
                                // </div>
                                //         '</div>'+
                                //     '</div>'+
                                // '</div>'
                            );
                        }),

                    ] : null;


                    //     response["eleves"]["total"] > 0 ?[
                    //         $('#grid-row').empty(),
                    //         $('#cmp').empty(),
                    //         $('#cmp').append('('+response["eleves"]["total"]+')'),

                    //         $.each(response["eleves"]["data"], function (key, item) {
                    //         $("#grid-row").append(
                    //             '<div class="col-lg-4 col-md-6 col-sm-6 col-12">'+
                    //                 '<div class="card card-profile">'+
                    //                     '<div class="card-header justify-content-end pb-0 border-0">'+
                    //                         '<div class="dropdown">'+
                    //                            ' <button class="btn btn-link" type="button" data-bs-toggle="dropdown">'+
                    //                                 '<span class="dropdown-dots fs--1"></span>'+
                    //                             '</button>'+
                    //                             '<div class="dropdown-menu dropdown-menu-right border py-0">'+
                    //                                ' <div class="py-2">'+
                    //                                     '<a class="dropdown-item" href="/eleves/'+item.idElev+'/edit">Modifier</a>'+
                    //                                     '<!-- <a class="dropdown-item text-danger" href="javascript:void(0);">Supprimer</a> -->'+
                    //                                 '</div>'+
                    //                             '</div>'+
                    //                        ' </div>'+
                    //                    ' </div>'+
                    //                    ' <div class="card-body pt-2">'+
                    //                         '<div class="text-center">'+
                    //                             '<div class="profile-photo">'+
                    //                                 '<img src="/assets/images/eleves/'+item.avatar+'" width="100" class="img-fluid rounded-circle" alt="">'+
                    //                             '</div>'+
                    //                             '<h3 class="mt-4 mb-1">'+item.firstname+'</h3>'+
                    //                             '<p class="text-muted">'+item.lastname+'</p>'+
                    //                             '<ul class="list-group mb-3 list-group-flush">'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Genre :</span><strong>'+item.genre+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Date de naissance :</span>'+
                    //                                     '<strong>'+item.birthday+'</strong>'+
                    //                                 '</li>'+
                    //                                ' <li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Lieu de naissance :</span>'+
                    //                                     '<strong>'+item.lieu+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Nationalite:</span>'+
                    //                                     '<strong>'+item.nation+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Matricule:</span>'+
                    //                                    ' <strong>'+item.code+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Redoublant:</span>'+
                    //                                     '<strong>'+item.statut+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Regime:</span>'+
                    //                                     '<strong>'+item.regim+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Affect&eacute;(e):</span>'+
                    //                                     '<strong>'+item.affected+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Ann&eacute;(e):</span>'+
                    //                                     '<strong>'+item.annee+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Classe:</span>'+
                    //                                     '<strong>'+item.classe+'</strong>'+
                    //                                 '</li>'+
                    //                                 '<li class="list-group-item px-0 d-flex justify-content-between">'+
                    //                                     '<span class="mb-0">Inscrit(e) le:</span><strong>'+item.createdate+'</strong>'+
                    //                                 '</li>'+
                    //                             '</ul>'+
                    //                             '<a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="">Voir plus</a>'+
                    //                         '</div>'+
                    //                     '</div>'+
                    //                ' </div>'+
                    //             '</div>'+
                    //         '<!-- pagination grille -->'
                    //     );
                    //     }),

                    // ] : null;
                    // if(response["eleves"]["total"]>response["eleves"]["per_page"]){

                    // $('#grid-row').after('<div class="row" style="float:right;"><nav class="nav text-right" id="paginating"></nav></div>'),
                    //     $.each(response["eleves"]["links"],function(clef,vale){
                    //          $("#paginating").append('<a href="'+vale.url+'" class="btn btn-link" target="_parent">'+vale.label+'</a>'); 
                    //            if(vale.url==null){
                    //             $('a[class="btn btn-link"]').css(["pointer:none;cursor:none;"]);
                    //            }
                    //            if(vale.active==true&&vale.url!=null){
                    //             $('a[class="btn btn-link"]').attr("class","btn btn-link active");
                    //            }
                    //     })

                    // }
                    // pagination


                },
            },
            d.preventDefault()) : null;
    });
    // student by mat
    $('#search-btn').on('click', function (e) {
        $.ajax({
            url: 'create/' + $("#matriculeS").val(),
            type: "get",
            // data: {
            //     type: $('#type').val(),
            //     annee: $('#annee').val(),
            // },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response["eleves"].length > 0) {
                    // alert("Succès!")
                    $.each(response["eleves"], function (key, valeur) {
                        $("input[name='nom']").attr("value", valeur.firstname);
                        $("input[name='prenoms']").attr("value", valeur.lastname);
                        $("input[name='datenais']").attr("value", valeur.birthday);
                        $("input[name='lieunais']").attr("value", valeur.lieu);
                        $("select[name='sexe']").attr("value", valeur.genre);
                        $("input[name='nationnalite']").attr("value", valeur.nation);
                        $("input[name='matricule']").attr("value", valeur.code);
                        $("select[name='classe']").attr("value", valeur.classe);
                    });
                } else {
                    $("span[class='text text-danger']").empty();
                    $('small').after('<span class="text text-danger"><br>Ce matricule n\existe pas dans la base!</span>');
                }
            },
        });
        e.preventDefault();
    });

    // student by classe
    $("#paramClasse").on("click change", function () {
        $.ajax({
            type: "GET",
            url: "/evaluations/index/" + $(this).val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                // console.log(response);
                $("#paramEleve").empty();
                response.length > 0 ? [
                    $("#paramEleve").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
                    $.each(response, function (k, item) {
                        $("#paramEleve").append(
                            '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>');
                    })] : null;


            }
        });
    });

    // evaluations by student
    $("#paramEleve").change(function (v) {
        $.ajax({
            type: "GET",
            url: "/evaluations/index/" + $(this).val() + '/' + time,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                // console.log(response);
                response.length > 0 ? [
                    $("#grid").empty(),
                    $("#griditem").remove(),

                    $("li[class='nav-item']").after('<li class="nav-item" id="griditem">' +
                        '<a href="#grid-view" data-bs-toggle="tab" class="nav-link show">Grille</a>' +
                        '</li>'),
                    $("div[class='row tab-content']").append('<div id="grid-view" class="tab-pane fade show col-lg-12"><div class="row" id="grid"></div></div>'),
                    // $('#grid-view').after('<div class="row" style="float:right;"><nav class="nav text-right" id="paginating"></nav></div>'),
                    $.each(response, function (k, item) {
                        // console.log(item.nomEleve),
                        $("div[id='grid']").append(
                            '<div class="col-lg-4 col-md-6 col-sm-6 col-12">' +
                            '<div class="card card-profile">' +
                            '<div class="card-header justify-content-end pb-0 border-0">' +
                            '<div class="dropdown">' +
                            '<button class="btn btn-link" type="button" data-bs-toggle="dropdown">' +
                            '<span class="dropdown-dots fs--1"></span>' +
                            '</button>' +
                            '<div class="dropdown-menu dropdown-menu-right border py-0">' +
                            ' <div class="py-2">' +
                            '<a class="dropdown-item" href="/evaluations/' + item.codeEval + '/edit">Modifier</a>' +
                            '<!-- <a class="dropdown-item text-danger" href="javascript:void(0);">Supprimer</a> -->' +
                            '</div>' +
                            '</div>' +
                            ' </div>' +
                            ' </div>' +
                            ' <div class="card-body pt-2">' +
                            '<div class="text-center">' +
                            '<h3 class="mt-4 mb-1">' + item.nomEleve + '</h3>' +
                            '<p class="text-muted">' + item.prenomsEleve + '</p>' +
                            '<ul class="list-group mb-3 list-group-flush">' +
                            '<li class="list-group-item px-0 d-flex justify-content-between">' +
                            '<span class="mb-0">Periode :</span><strong>' + item.periode + '</strong>' +
                            '</li>' +
                            '<li class="list-group-item px-0 d-flex justify-content-between">' +
                            '<span class="mb-0">Classe :</span>' +
                            '<strong>' + item.classe + '</strong>' +
                            '</li>' +
                            ' <li class="list-group-item px-0 d-flex justify-content-between">' +
                            '<span class="mb-0">Type d\'&eacute;valuation :</span>' +
                            '<strong>' + item.type + '</strong>' +
                            '</li>' +
                            '<li class="list-group-item px-0 d-flex justify-content-between">' +
                            '<span class="mb-0">Note:</span>' +
                            '<strong>' + item.note + '</strong>' +
                            '</li>' +
                            '<li class="list-group-item px-0 d-flex justify-content-between">' +
                            '<span class="mb-0">Créée le:</span>' +
                            ' <strong>' + item.dateCrea + '</strong>' +
                            '</li>' +
                            '</ul>' +
                            // '<a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="">Voir plus</a>'+
                            '</div>' +
                            '</div>' +
                            ' </div>' +
                            '</div>' +
                            '<!-- pagination grille -->'
                        )
                    })] : null;
                // itemsPerPage = response['per_page'];
                // items = response['data'];
                // totalPages = Math.ceil(items.length / itemsPerPage);
                // createPagination();
                // showPage(response['current_page']);
            }
        });
    });




    // let itemsPerPage = 5;
    // let items = [
    //     "Item 1", "Item 2", "Item 3", "Item 4", "Item 5",
    //     "Item 6", "Item 7", "Item 8", "Item 9", "Item 10"
    // ];
    // let totalPages = Math.ceil(items.length / itemsPerPage);

    // function showPage(page) {
    //     $("#items").empty();
    //     let start = (page - 1) * itemsPerPage;
    //     let end = start + itemsPerPage;
    //     for (let i = start; i < end && i < items.length; i++) {
    //         $("#items").append("<li>" + items[i] + "</li>");
    //     }
    // }
    // function createPagination() {
    //     $("#pagination-container").empty();
    //     let pagination = $("<ul class='pagination'></ul>");
    //     for (let i = 1; i <= totalPages; i++) {
    //         let pageItem = $("<li><a href='#'>" + i + "</a></li>");
    //         pageItem.click((function (page) {
    //             return function () {
    //                 showPage(page);
    //             };
    //         })(i));
    //         pagination.append(pageItem);
    //     }
    //     $("#pagination-container").append(pagination);
    // }

    // createPagination();
    // showPage(1);



    // let itemsPerPage = 5;
    // let items = [];
    // let totalPages = Math.ceil(items.length / itemsPerPage);

    // function showPage(page) {
    //     $("#items").empty();
    //     totalPages = Math.ceil(items.length / itemsPerPage);
    //     let start = (page - 1) * itemsPerPage;
    //     let end = start + itemsPerPage;
    //     for (let i = start; i < end && i < items.length; i++) {
    //         $("#items").append("<li>" + items[i] + "</li>");
    //     }
    // }


    // function createPagination() {
    //     $("#paginating").empty();
    //     let pagination = $("#paginating").append('<li><a href="#">Prev</a></li><li><a href="#">' +
    //         '</a></li><li><a href="#">Suiv</a></li>');
    //     for (let i = 1; i <= totalPages; i++) {
    //         let pageItem = $('<li><a href="/evaluations?page=' + i + '">' + i + '</a></li>').attr("href", "/evaluations?page=" + i + "");
    //         pageItem.click((function (page) {
    //             return function () {
    //                 showPage(page);
    //             };
    //         })(i));
    //         pagination.append(pageItem);
    //     }
    //     $("#paginating").append(pagination);
    // }

    // createPagination();
    // showPage(1);




    // $("#btnFilterEvalu").click(function (e) {
    //     let paramClasse = $("select[name='paramClasse']").val();
    //     let paramEleve = $("select[name='paramEleve']").val();
    //     let paramDiscipline = $("select[name='paramDiscipline']").val();
    //     $.ajax({
    //         url: '/evaluations/index/' + paramClasse + "/" + paramEleve + '/' + paramDiscipline,
    //         type: "get",
    //         // data: {
    //         //     paramClasse,
    //         //     paramEleve,
    //         //     paramDiscipline,
    //         // },
    //         dataType: "json",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         success: function (response) {
    //             console.log(response);
    //             if (response.length > 0) {

    //                 // alert("Succès!")
    //                 $.each(response, function (key, valeur) {

    //                     // $("select[name='paramClasse']").attr("value", valeur.genre);
    //                     // $("select[name='paramEleve']").attr("value", valeur.classe);
    //                     // $("select[name='paramDiscipline']").attr("value", valeur.classe);
    //                 });
    //             } else {
    //                 $("span[class='text text-danger']").empty();
    //                 $('small').after('<span class="text text-danger"><br>Ce matricule n\existe pas dans la base!</span>');
    //             }
    //         },
    //     });
    //     e.preventDefault();
    // });










    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs5').select2({
            theme: 'bootstrap5'
        });
    });
});






