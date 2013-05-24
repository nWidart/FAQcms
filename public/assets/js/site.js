$(document).ready(function() {
    $('.wysihtml5').wysihtml5();

    $("table").tablecloth({
        theme: "stats",
        bordered: true,
        condensed: true,
        sortable: true,
        striped: true
    });
});
