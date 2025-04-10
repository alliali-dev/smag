$(document).ready(() => {
    // alert("Hello!\nYou are welcome!");
    let pp = $('#pp').val();
    let pc = $('#pc').val();
    let pd = $('#pd').val();
    // let cursor = $("#load-more").data("cursor");
    let paginateNav = $("#paginateNav");

    let prevnextPage = null;
    let prev_page_url = null;

    let nextPage = null;
    let next_page_url = null;

    // console.log(pp,
    //     pc,
    //     pd,);
    $.ajax({
        type: "GET",
        url: "/notes/index/" + pp + "/" + pc + "/" + pd,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        // data: { cursor: cursor },
        success: function (response) {
            prev_page_url = response.datas.prev_page_url;
            next_page_url = response.datas.next_page_url;
            let data = response.datas;
            // let total = data.length;
            console.log(data);
            // console.log("Prev:" + prev_page_url + "\n", "Next:" + next_page_url);
            if (next_page_url != null) {
                paginateNav.append(`<a href="${next_page_url}" class="btn btn-primary">Suivant<a/>`);
            }
            // console.log(total);
            // $("#pp").empty();
            return data.length > 0 ? [
                console.log(data,),
                // $("tbody").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
                $.each(data, function (k, item) {
                    // console.log(item["firstname"]);
                    $("tbody").append(
                        `<tr class="tbody">
                        <td>
                        ${item.firstname + "&nbsp;&nbsp;&nbsp;" + item.lastname}
                        </td>
                        </tr>`
                        // '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>'
                    );
                })] : null;


        }
    });


    $("#pc").on("change", function () {
        $.ajax({
            type: "GET",
            url: "/notes/index/" + pp + "/" + pc + "/" + pd,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                prev_page_url = response.datas.prev_page_url;
                next_page_url = response.datas.next_page_url;
                let data = response.datas.data;
                let total = data.length;
                // console.log("Prev:" + prev_page_url + "\n", "Next:" + next_page_url);
                if (next_page_url != null) {
                    paginateNav.append(`<a href="${next_page_url}" class="btn btn-primary">Suivant<a/>`);
                }
                console.log(total);
                // $("#pp").empty();
                return total > 0 ? [
                    console.log(data,),
                    // $("tbody").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
                    $.each(data, function (k, item) {
                        // console.log(item["firstname"]);
                        $("tbody").append(
                            `<tr class="tbody">
                        <td>
                        ${item.firstname + "&nbsp;&nbsp;&nbsp;" + item.lastname}
                        </td>
                        </tr>`
                            // '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>'
                        );
                    })] : null;


            }
        });
    });

    $("#pp").on("change", function () {
        $.ajax({
            type: "GET",
            url: "/notes/index/" + pp + "/" + pc + "/" + pd,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                prev_page_url = response.datas.prev_page_url;
                next_page_url = response.datas.next_page_url;
                let data = response.datas.data;
                let total = data.length;
                // console.log("Prev:" + prev_page_url + "\n", "Next:" + next_page_url);
                if (next_page_url != null) {
                    paginateNav.append(`<a href="${next_page_url}" class="btn btn-primary">Suivant<a/>`);
                }
                console.log(total);
                // $("#pp").empty();
                return total > 0 ? [
                    console.log(data,),
                    // $("tbody").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
                    $.each(data, function (k, item) {
                        // console.log(item["firstname"]);
                        $("tbody").append(
                            `<tr class="tbody">
                        <td>
                        ${item.firstname + "&nbsp;&nbsp;&nbsp;" + item.lastname}
                        </td>
                        </tr>`
                            // '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>'
                        );
                    })] : null;


            }
        });
    });

    $("#pd").on("change", function () {
        $.ajax({
            type: "GET",
            url: "/notes/index/" + pp + "/" + pc + "/" + pd,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                prev_page_url = response.datas.prev_page_url;
                next_page_url = response.datas.next_page_url;
                let data = response.datas.data;
                let total = data.length;
                // console.log("Prev:" + prev_page_url + "\n", "Next:" + next_page_url);
                if (next_page_url != null) {
                    paginateNav.append(`<a href="${next_page_url}" class="btn btn-primary">Suivant<a/>`);
                }
                console.log(total);
                // $("#pp").empty();
                return total > 0 ? [
                    console.log(data,),
                    // $("tbody").append('<option value="" disabled selected>Choisissez l\'&eacute;l&egrave;ve</option>'),
                    $.each(data, function (k, item) {
                        // console.log(item["firstname"]);
                        $("tbody").append(
                            `<tr class="tbody">
                        <td>
                        ${item.firstname + "&nbsp;&nbsp;&nbsp;" + item.lastname}
                        </td>
                        </tr>`
                            // '<option value="' + item.elId + '">' + item.ref + ' | ' + item.firstname + ' ' + item.lastname + '</option>'
                        );
                    })] : null;

            }
        });
    });


}
);